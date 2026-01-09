def decide_followup(age, risk):
    if age >= 60:
        method = "Hospital Call"
    else:
        method = "WhatsApp + SMS"

    if risk == "High":
        days = 2
    elif risk == "Medium":
        days = 5
    else:
        days = 7

    return method, days
