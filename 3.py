#source: https://www.geeksforgeeks.org/number-of-handshakes-such-that-a-person-shakes-hands-only-once/
# This code is contributed by Shivi_Aggarwal


def count_handshake(n):
    # when n becomes 0 that means
    # all the persons have done
    # handshake with other
    if (n == 0):
        return 0
    else:
        return (n - 1) + count_handshake(n - 1)


print(count_handshake(6))

