from llm import ask_llm

def simplify_discharge(discharge, language, age):
    prompt = f"""
    Simplify the following discharge instructions into very simple {language}.
    Patient age: {age}
    Use bullet points. Avoid medical terms.

    Discharge:
    {discharge}
    """
    return ask_llm(prompt)
