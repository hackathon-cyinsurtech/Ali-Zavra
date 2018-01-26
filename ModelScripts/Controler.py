import pandas as pd
import sys
import Data as data
import Model as mod

def filterSets(filter,train,train_label,test,test_label):

    train_filtered = []
    train_label_filtered = []
    test_filtered = []
    test_label_filtered = []

    if filter == "age":
        min_age = int(sys.argv[3])
        max_age = int(sys.argv[4])

        # Train Set filtering
        for person in range(0, len(train)):
            # 0 = Age -> change this to directory later
            if train[person][0] >= min_age and train[person][0] <= max_age:
                train_filtered.append(train[person])
                train_label_filtered.append(train_label[person])

        # Test set filtering
        for person in range(0, len(test)):
            # 0 = Age -> change this to directory later
            if test[person][0] >= min_age and test[person][0] <= max_age:
                test_filtered.append(test[person])
                test_label_filtered.append(test_label[person])
    else:
        # No Filter
        return [train,train_label,test,test_label]

    return [train_filtered,train_label_filtered,test_filtered,test_label_filtered]

if __name__ == '__main__':
    set = data.Data()
    model = mod.Model()

    # Training Set
    train_data = pd.read_csv('data/carInsurance_train.csv')
    train_set = set.createSet(train_data)
    train = train_set[0]
    train_label = train_set[1]

    # Test Set
    test_data = pd.read_csv('data/carInsurance_test.csv')
    test_set = set.createSet(test_data)
    test = test_set[0]
    test_label = test_set[1]

    if (sys.argv[1] == "stats"):

        if sys.argv[2] == "age":
            sets = filterSets("age",train,train_label,test,test_label)
            train = sets[0]
            train_label = sets[1]
            test = sets[2]
            test_label = sets[3]

        metrics = model.classify(train, test, train_label, test_label)
        print(metrics)
        #print("F1 Score: ", metrics[0])
        #print("Accuracy: ", metrics[1])
        #print("False Positives: ", metrics[2])
        #print("False Negatives: ", metrics[3])
    elif (sys.argv[1] == "train"):
        if sys.argv[2] == "age":
            sets = filterSets("age", train, train_label, test, test_label)
            train = sets[0]
            train_label = sets[1]
            test = sets[2]
            test_label = sets[3]

        prediction = model.predict(train, test, train_label)
        print(prediction)

