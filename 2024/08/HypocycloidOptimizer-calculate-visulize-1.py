
import matplotlib.pyplot as plt
import numpy as np

# Function to calculate hypocycloid coordinates
def calculate_hypocycloid(R, r, theta_values):
    x_values = (R - r) * np.cos(theta_values) + r * np.cos((R - r) / r * theta_values)
    y_values = (R - r) * np.sin(theta_values) - r * np.sin((R - r) / r * theta_values)
    return x_values, y_values

# Generate and plot the hypocycloid
theta_values = np.arange(0, 2 * np.pi, 0.01)
x_values, y_values = calculate_hypocycloid(1, 0.5, theta_values)

plt.figure(figsize=(6, 6))
plt.plot(x_values, y_values, label='Hypocycloid Shape')
plt.title('Hypocycloid Visualization')
plt.xlabel('x')
plt.ylabel('y')
plt.grid(True)
plt.show()
