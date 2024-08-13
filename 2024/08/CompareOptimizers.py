# CompareOptimizers.py

import torch
import torch.nn as nn
import torch.optim as optim
from HypocycloidOptimizer import HypocycloidOptimizer
import matplotlib.pyplot as plt

# Define a simple model
model = nn.Linear(10, 1).cuda()
criterion = nn.MSELoss()

# Define hyperparameters
learning_rates = [0.1]
R_values = [1]
r_values = [0.1]

# Store loss values for comparison
sgd_losses = []
hypocycloid_losses = []

def train_model(optimizer_name, lr, R=None, r=None):
    model = nn.Linear(10, 1).cuda()
    criterion = nn.MSELoss()
    
    if optimizer_name == 'SGD':
        optimizer = optim.SGD(model.parameters(), lr=lr)
    elif optimizer_name == 'Hypocycloid':
        optimizer = HypocycloidOptimizer(model.parameters(), lr=lr, R=R, r=r)
    
    losses = []
    for epoch in range(100):  # Increase epochs for better comparison
        inputs = torch.randn(64, 10).cuda()
        targets = torch.randn(64, 1).cuda()

        optimizer.zero_grad()
        outputs = model(inputs)
        loss = criterion(outputs, targets)
        loss.backward()
        optimizer.step()

        losses.append(loss.item())
        
        if epoch % 10 == 0:
            print(f'{optimizer_name} Epoch {epoch+1}/100, Loss: {loss.item()}')

    return losses

# Train with SGD
for lr in learning_rates:
    sgd_losses.append(train_model('SGD', lr))

# Train with HypocycloidOptimizer
for lr, R, r in zip(learning_rates, R_values, r_values):
    hypocycloid_losses.append(train_model('Hypocycloid', lr, R, r))

# Plotting the results
plt.figure(figsize=(12, 6))

# Plot SGD losses
for i, losses in enumerate(sgd_losses):
    plt.plot(losses, label=f'SGD (lr={learning_rates[i]})')

# Plot HypocycloidOptimizer losses
for i, losses in enumerate(hypocycloid_losses):
    plt.plot(losses, label=f'HypocycloidOptimizer (lr={learning_rates[i]}, R={R_values[i]}, r={r_values[i]})')

plt.xlabel('Epoch')
plt.ylabel('Loss')
plt.title('Training Loss Comparison')
plt.legend()
plt.show()

