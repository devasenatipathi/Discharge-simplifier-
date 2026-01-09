from agents.simplifier import simplify_discharge
from agents.understanding import evaluate_understanding
from agents.followup import decide_followup
from database import save_record
from messaging import send_whatsapp, send_sms, hospital_call

def run_careflow(discharge, language, age):

    simplified = simplify_discharge(discharge, language, age)
    score, risk = evaluate_understanding(simplified)
    followup, days = decide_followup(age, risk)

    save_record(age, language, discharge, simplified, risk, followup)

    msg = f"Risk Level: {risk}. Please follow instructions carefully."

    if followup == "Hospital Call":
        hospital_call(msg)
    else:
        send_whatsapp(msg)
        send_sms(msg)

    return simplified, score, risk, followup, days
