print("CÁLCULO DEL ÍNDICE DE LA MASA CORPORAL (IMC)");

BAJO = 18.50;
NORMAL = 24.99;
SOBREPESO = 25;
OBESIDAD = 30;

peso = float(input("¿Cuánto pesa? "));
altura = float(input("¿Cuánto mide? "));

imc = round(peso/pow(altura,2), 2);

if imc < BAJO:
    if imc < 16:
        print(f"Delgadez severa ({imc})");
    elif imc >= 16 and imc < 17:
        print(f"Delgadez moderada ({imc})");
    elif imc >= 17 and imc < BAJO:
        print(f"Delgadez leve ({imc})");
elif imc >= BAJO and imc < NORMAL:
    print(f"Normal ({imc})");
elif imc >= NORMAL and imc < OBESIDAD:
    print(f"Sobrepeso, preobesidad ({imc})");
elif imc >= OBESIDAD:
    print(f"Bro tas mu gordo, para ({imc})");
