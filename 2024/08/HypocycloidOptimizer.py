import torch
import matplotlib.pyplot as plt

# Best Parameters: lr=0.01, R=1, r=0.1, theta_step=0.1
# Best Parameters: lr=0.001, R=1.5, r=0.1, theta_step=0.1
# Best Parameters: lr=0.1, R=1, r=0.1, theta_step=0.01

# Hypocycloid-based gradient descent optimizer
class HypocycloidOptimizer(torch.optim.Optimizer):
    def __init__(self, params, lr=0.1, R=1, r=0.1):
        defaults = dict(lr=lr, R=R, r=r, theta=0.01)
        super(HypocycloidOptimizer, self).__init__(params, defaults)

    def step(self, closure=None):
        loss = None
        if closure is not None:
            loss = closure()

        for group in self.param_groups:
            R = group['R']
            r = group['r']
            theta = group['theta']
            lr = group['lr']

            hypocycloid_lr = lr * torch.cos(torch.tensor((R - r) / r * theta))

            for p in group['params']:
                if p.grad is None:
                    continue
                d_p = p.grad.data
                p.data.add_(d_p, alpha=-hypocycloid_lr)

            group['theta'] += 0.1  # Update theta for next step

        return loss

# Example usage with a simple neural network
model = torch.nn.Linear(10, 1).cuda()
criterion = torch.nn.MSELoss()
optimizer = HypocycloidOptimizer(model.parameters(), lr=0.01)

# To store the loss values
losses = []

# Training loop
for epoch in range(1000):
    inputs = torch.randn(64, 10).cuda()
    targets = torch.randn(64, 1).cuda()

    optimizer.zero_grad()
    outputs = model(inputs)
    loss = criterion(outputs, targets)
    loss.backward()
    optimizer.step()

    # Store the loss value
    losses.append(loss.item())
    # Print loss for each epoch
    print(f'Epoch {epoch+1}/100, Loss: {loss.item():.4f}')

# Plotting the loss curve
plt.plot(losses)
plt.xlabel('Epoch')
plt.ylabel('Loss')
plt.title('Training Loss Over Time')
plt.show()

