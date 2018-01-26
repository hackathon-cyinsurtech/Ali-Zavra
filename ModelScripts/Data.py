class Data:

    def createSet(self,data):
        train = []
        label = []
        for i in range(len(data)):
            features = []
            located = data.iloc[i]

            # Marital Status
            marital = 0
            if located['Marital'] == "divorced":
                marital = 0
            elif located['Marital'] == "married":
                marital = 1
            else:
                marital = 2

            # Education
            education = 0
            if located['Education'] == 'tertiary':
                education = 0
            elif located['Education'] == 'primary':
                education = 1
            elif located['Education'] == 'secondary':
                education = 2
            else:
                # Not provided
                education = int(-1)

            features.append(int(located['Age']))
            features.append(marital)
            features.append(education)
            features.append(int(located['Default']))
            features.append(float(located['Balance']))
            features.append(int(located['HHInsurance']))
            train.append(features)

            if int(located['CarInsurance'] == 1):
                label.append(1)
            else:
                label.append(0)
        return [train, label]