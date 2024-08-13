import torch
import matplotlib.pyplot as plt
import numpy as np

# Hypocycloid parameters
#R = 1.5
#r = 0.1
#theta_step = 0.1

R = 1
r = 0.1
theta_step = 0.01



# Function to calculate hypocycloid coordinates
def calculate_hypocycloid(R, r, theta_values):
    x_values = (R - r) * np.cos(theta_values) + r * np.cos((R - r) / r * theta_values)
    y_values = (R - r) * np.sin(theta_values) - r * np.sin((R - r) / r * theta_values)
    return x_values, y_values

# Generate theta values
theta_values = np.arange(0, 2 * np.pi, theta_step)

# Calculate hypocycloid coordinates
x_values, y_values = calculate_hypocycloid(R, r, theta_values)

# Plot the hypocycloid
plt.figure(figsize=(6, 6))
plt.plot(x_values, y_values, label=f'R={R}, r={r}')
plt.title('Hypocycloid Shape')
plt.xlabel('x')
plt.ylabel('y')
plt.axhline(0, color='black',linewidth=0.5)
plt.axvline(0, color='black',linewidth=0.5)
plt.grid(True)
plt.legend()
plt.show()

