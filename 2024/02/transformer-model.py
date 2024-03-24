import torch
import torch.nn as nn
import torch.optim as optim
from torch.utils.data import DataLoader, Dataset
from sklearn.model_selection import train_test_split
import numpy as np

# Define a simple Transformer model
class TransformerModel(nn.Module):
    def __init__(self, input_size, hidden_size, num_layers, num_heads, dropout):
        super(TransformerModel, self).__init__()
        self.embedding = nn.Linear(input_size, hidden_size)
        self.transformer = nn.TransformerEncoder(nn.TransformerEncoderLayer(hidden_size, num_heads, dim_feedforward=hidden_size), num_layers)
        self.output_layer = nn.Linear(hidden_size, 1)

    def forward(self, x):
        # Ensure that input tensor has shape (batch_size, seq_len, input_size)
        if len(x.shape) == 2:
            x = x.unsqueeze(1)  # Add a dummy sequence dimension
        x = self.embedding(x)
        x = x.permute(1, 0, 2)  # Adjust shape for Transformer input
        x = self.transformer(x)
        x = x.mean(dim=0)       # Aggregate across sequence length
        x = self.output_layer(x)
        return x.squeeze()

# Define a custom dataset for P2P node data
class P2PNodeDataset(Dataset):
    def __init__(self, features, labels):
        self.features = torch.tensor(features, dtype=torch.float32)
        self.labels = torch.tensor(labels, dtype=torch.float32)

    def __len__(self):
        return len(self.features)

    def __getitem__(self, idx):
        return self.features[idx], self.labels[idx]

# Generate synthetic data for demonstration
def generate_data(num_samples, num_features):
    features = np.random.rand(num_samples, num_features)  # Random features
    labels = np.random.rand(num_samples)  # Random labels (representing suitability for data transmission)
    return features, labels

# Define training parameters
num_samples = 1000
num_features = 5
hidden_size = 64
num_layers = 2
num_heads = 4
dropout = 0.1
batch_size = 32
num_epochs = 10

# Generate synthetic P2P node data
features, labels = generate_data(num_samples, num_features)

# Split data into training and validation sets
X_train, X_val, y_train, y_val = train_test_split(features, labels, test_size=0.2, random_state=42)

# Create dataset and dataloaders
train_dataset = P2PNodeDataset(X_train, y_train)
train_loader = DataLoader(train_dataset, batch_size=batch_size, shuffle=True)
val_dataset = P2PNodeDataset(X_val, y_val)
val_loader = DataLoader(val_dataset, batch_size=batch_size)

# Initialize Transformer model
model = TransformerModel(input_size=num_features, hidden_size=hidden_size, num_layers=num_layers, num_heads=num_heads, dropout=dropout)

# Define loss function and optimizer
criterion = nn.MSELoss()
optimizer = optim.Adam(model.parameters(), lr=0.001)

# Training loop
for epoch in range(num_epochs):
    model.train()
    total_loss = 0
    for batch_features, batch_labels in train_loader:
        optimizer.zero_grad()
        output = model(batch_features)
        loss = criterion(output, batch_labels)
        loss.backward()
        optimizer.step()
        total_loss += loss.item()
    print(f"Epoch {epoch+1}, Loss: {total_loss}")

# Evaluation loop
model.eval()
val_loss = 0
with torch.no_grad():
    for batch_features, batch_labels in val_loader:
        output = model(batch_features)
        loss = criterion(output, batch_labels)
        val_loss += loss.item()
    print(f"Validation Loss: {val_loss}")

