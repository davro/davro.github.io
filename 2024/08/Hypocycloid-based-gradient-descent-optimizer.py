import torch

# Hypocycloid-based gradient descent optimizer
class HypocycloidOptimizer(torch.optim.Optimizer):
    def __init__(self, params, lr=0.01, R=1, r=0.5):
        defaults = dict(lr=lr, R=R, r=r, theta=0)
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
            #hypocycloid_lr = lr * torch.cos((R - r) / r * theta) 
            # fix
            hypocycloid_lr = lr * torch.cos(torch.tensor((R - r) / r * theta))

            for p in group['params']:
                if p.grad is None:
                    continue
                d_p = p.grad.data
                #p.data.add_(-hypocycloid_lr, d_p)
                p.data.add_(d_p, alpha=-hypocycloid_lr)

            group['theta'] += 0.1  # Update theta for next step

        return loss

# Example usage with a simple neural network
model = torch.nn.Linear(10, 1).cuda()
criterion = torch.nn.MSELoss()
optimizer = HypocycloidOptimizer(model.parameters(), lr=0.01)

# Training loop
for epoch in range(100):
    inputs = torch.randn(64, 10).cuda()
    targets = torch.randn(64, 1).cuda()

    optimizer.zero_grad()
    outputs = model(inputs)
    loss = criterion(outputs, targets)
    loss.backward()
    optimizer.step()




