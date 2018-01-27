from sklearn.metrics import f1_score
import sklearn.metrics as sk_metrics
from sklearn.ensemble import GradientBoostingClassifier

class Model:

    def predict(self,X_train,X_test,Y_train):
        clf = GradientBoostingClassifier()
        clf.fit(X_train, Y_train)
        prediction = clf.predict(X_test)

        return prediction

    def classify(self,X_train,X_test,Y_train,Y_test):
        clf = GradientBoostingClassifier()
        falsePositives = 0
        falseNegatives = 0
        metrics = []

        clf.fit(X_train, Y_train)
        prediction = clf.predict(X_test)
        f1 = f1_score(Y_test, prediction, average='macro')
        ac = sk_metrics.accuracy_score(prediction, Y_test)
        importance = clf.feature_importances_

        # Return metrics
        metrics.append(f1)
        metrics.append(ac)
        metrics.append(falsePositives)
        metrics.append(falseNegatives)
        metrics.append(importance)

        return metrics