print("================================")
print("       SD TRADERS")
print("  ELECTRIC TOY CALCULATOR")
print("================================")

print("1. Electric Racing Car - Rs. 1499")
print("2. Smart Robot         - Rs. 999")
print("3. RC Helicopter       - Rs. 1799")
print("4. Electric Bike        - Rs. 2499")
print("5. RC Drift Car        - Rs. 650")
print("6. Dancing Frog        - Rs. 410")

prices = {
    1: 1499,
    2: 999,
    3: 1799,
    4: 2499,
    5: 650,
    6: 410
}

try:
    choice = int(input("\nEnter product number: "))
    quantity = int(input("Enter quantity: "))

    if choice in prices:
        total = prices[choice] * quantity
        print("\nQuantity:", quantity)
        print(f"Total Amount: Rs. {total:.2f}")

        if total >= 3000:
            discount = total * 0.10
            final_amount = total - discount
            print(f"Discount (10%): Rs. {discount:.2f}")
            print(f"Final Amount: Rs. {final_amount:.2f}")
        else:
            print(f"Final Amount: Rs. {total:.2f}")
    else:
        print("Invalid product selection.")
except ValueError:
    print("Please enter valid numeric input.")