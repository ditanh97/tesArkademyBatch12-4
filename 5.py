def buyNoodle(date, cash):
    numOfNoodle = round(cash/2500) #ambil round quotient nya
    print(numOfNoodle)
    bonus = 0
    if date % 2 == 0:
        bonus = numOfNoodle//4
    else:
        bonus = numOfNoodle//3

    if date % 5 == 0:
        if bonus % 2 == 0:
            bonus *= 10
        else:
            bonus *= 5
    print("bonus= " + str(bonus))

    numOfNoodle += bonus
    return numOfNoodle

print(buyNoodle(25, 50000))