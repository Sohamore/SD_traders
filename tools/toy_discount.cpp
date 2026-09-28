#include <iostream>
using namespace std;

int main()
{
    double amount;
    double discount;
    double finalAmount;

    cout << "==============================" << endl;
    cout << "          SD TRADERS          " << endl;
    cout << "     TOY DISCOUNT SYSTEM      " << endl;
    cout << "==============================" << endl;

    cout << "Enter total purchase amount: Rs. ";
    if (!(cin >> amount) || amount < 0) {
        cout << "Invalid input. Please enter a valid positive number." << endl;
        return 1;
    }

    if (amount >= 5000)
    {
        discount = amount * 0.15;
    }
    else if (amount >= 3000)
    {
        discount = amount * 0.10;
    }
    else if (amount >= 1500)
    {
        discount = amount * 0.05;
    }
    else
    {
        discount = 0;
    }

    finalAmount = amount - discount;

    cout << "Discount: Rs. " << discount << endl;
    cout << "Final Amount: Rs. " << finalAmount << endl;
    cout << "Thank you for shopping with SD Traders!" << endl;

    return 0;
}