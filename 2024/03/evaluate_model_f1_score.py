import torch
from ml_complex_cnn_CIFAR_10_hyperparameter_best import Net  # Assuming Net is the class defining your CNN model
import torchvision
import torchvision.transforms as transforms

# Define the transformations for the dataset
transform_test = transforms.Compose([
    transforms.ToTensor(),
    transforms.Normalize((0.5, 0.5, 0.5), (0.5, 0.5, 0.5))
])

# Load the CIFAR-10 test dataset
testset = torchvision.datasets.CIFAR10(root='~/workspace/sandbox/data', train=False, download=True, transform=transform_test)
testloader = torch.utils.data.DataLoader(testset, batch_size=128, shuffle=False, num_workers=2)

# Load the trained model
net = Net()
net.load_state_dict(torch.load('ml_complex_cnn_CIFAR_10_trained_model.pth'))
device = torch.device("cuda:0" if torch.cuda.is_available() else "cpu")
net.to(device)  # Move the model to the appropriate device
net.eval()  # Set the model to evaluation mode

# Evaluation Metrics Initialization
total_correct = 0
total_samples = 0
true_positives = 0
false_positives = 0
false_negatives = 0

# For calculating F1 score
epsilon = 1e-7  # to avoid division by zero

# Testing the network
with torch.no_grad():
    for data in testloader:
        images, labels = data[0].to(device), data[1].to(device)  # Move input data to the appropriate device
        outputs = net(images)
        _, predicted = torch.max(outputs.data, 1)
        total_samples += labels.size(0)
        total_correct += (predicted == labels).sum().item()

        # Calculate true positives, false positives, and false negatives
        true_positives += ((predicted == 1) & (labels == 1)).sum().item()
        false_positives += ((predicted == 1) & (labels == 0)).sum().item()
        false_negatives += ((predicted == 0) & (labels == 1)).sum().item()

# Calculate accuracy
accuracy = 100 * total_correct / total_samples
print('Accuracy of the network on the test images: {:.2f}%'.format(accuracy))

# Calculate precision, recall, and F1 score
precision = true_positives / (true_positives + false_positives + epsilon)
recall = true_positives / (true_positives + false_negatives + epsilon)
f1_score = 2 * (precision * recall) / (precision + recall + epsilon)

print('Precision: {:.4f}'.format(precision))
print('Recall: {:.4f}'.format(recall))
print('F1 Score: {:.4f}'.format(f1_score))

