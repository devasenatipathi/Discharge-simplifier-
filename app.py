import streamlit as st
from agents.orchestrator import run_careflow
from database import init_db

init_db()

st.title("🏥 CareFlow – AI Discharge Assistant")

discharge = st.text_area("Paste Discharge Slip")
age = st.number_input("Patient Age", 1, 100)
language = st.selectbox("Language", ["English", "Tamil", "Hindi"])

if st.button("Process"):
    simplified, score, risk, followup, days = run_careflow(
        discharge, language, age
    )

    st.subheader("Simplified Instructions")
    st.write(simplified)

    st.subheader("Understanding Score")
    st.write(score)

    st.subheader("Risk Level")
    st.write(risk)

    st.subheader("Follow-up Method")
    st.write(f"{followup} after {days} days")
