import torch
import torch.nn as nn
import torch.optim as optim
import numpy as np
from itertools import product
from HypocycloidOptimizer import HypocycloidOptimizer  # Import the optimizer class

# Define the model
model = nn.Linear(10, 1).cuda()
criterion = nn.MSELoss()

# Define hyperparameter ranges
learning_rates = [0.001, 0.01, 0.1]
R_values = [0.5, 1, 1.5]
r_values = [0.1, 0.5, 1]
theta_steps = [0.01, 0.1, 0.5]

# Grid search
best_loss = float('inf')
best_params = None

for lr, R, r, theta_step in product(learning_rates, R_values, r_values, theta_steps):
    optimizer = HypocycloidOptimizer(model.parameters(), lr=lr, R=R, r=r)
    
    # Training loop
    for epoch in range(1000):  # Use a smaller number of epochs for hyperparameter tuning
        inputs = torch.randn(64, 10).cuda()
        targets = torch.randn(64, 1).cuda()
        
        optimizer.zero_grad()
        outputs = model(inputs)
        loss = criterion(outputs, targets)
        loss.backward()
        optimizer.step()

        if epoch % 1 == 0:
            print(f'Epoch {epoch+1}/10, Loss: {loss.item()}')

    # Evaluate on validation set (if available)
    # validation_loss = ...

    if loss.item() < best_loss:
        best_loss = loss.item()
        best_params = (lr, R, r, theta_step)

print(f'Best Parameters: lr={best_params[0]}, R={best_params[1]}, r={best_params[2]}, theta_step={best_params[3]}')

