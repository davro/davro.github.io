from itertools import product

# Parameter grid for hyperparameter tuning
param_grid = {
    'lr': [0.001, 0.01, 0.1],
    'R': [1, 1.5, 2],
    'r': [0.1, 0.5, 1],
    'theta_step': [0.01, 0.1, 0.2]
}

# Grid search implementation
best_loss = float('inf')
best_params = None

for lr, R, r, theta_step in product(param_grid['lr'], param_grid['R'], param_grid['r'], param_grid['theta_step']):
    optimizer = HypocycloidOptimizer(model.parameters(), lr=lr, R=R, r=r)
    for epoch in range(100):
        # Training loop
        # ...
        loss = criterion(outputs, targets)
        if loss.item() < best_loss:
            best_loss = loss.item()
            best_params = (lr, R, r, theta_step)

print(f'Best Parameters: lr={best_params[0]}, R={best_params[1]}, r={best_params[2]}, theta_step={best_params[3]}')
