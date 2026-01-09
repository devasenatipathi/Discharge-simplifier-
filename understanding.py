from llm import ask_llm

def evaluate_understanding(text):
    prompt = f"""
    Analyze the instructions and give:
    Score (0-100)
    Risk (Low / Medium / High)

    Instructions:
    {text}

    Format:
    Score: <number>
    Risk: <level>
    """
    res = ask_llm(prompt)
    lines = res.splitlines()
    score = int(lines[0].split(":")[1].strip())
    risk = lines[1].split(":")[1].strip()
    return score, risk
