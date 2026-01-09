from openai import OpenAI

client = OpenAI(api_key="PASTE_YOUR_API_KEY_HERE")

def ask_llm(prompt):
    response = client.chat.completions.create(
        model="gpt-4o-mini",
        messages=[
            {"role": "system", "content": "You are a healthcare assistant."},
            {"role": "user", "content": prompt}
        ],
        temperature=0.3
    )
    return response.choices[0].message.content
