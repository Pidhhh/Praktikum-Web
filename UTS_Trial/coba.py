import openai
import json

# Your OpenAI API key
openai.api_key = "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"

# Paths for input and output files
# input_file_path = "E:/Artificial Intelligent/WaWebBeta_Pidh/OpenAIBaseInput.txt"
# output_file_path = "E:/Artificial Intelligent/WaWebBeta_Pidh/OpenAIBaseAnswer.txt"

# input_file_path = input(str("Masukkan pertanyaan:"))

# def read_input_from_file(file_path):
#     with open(file_path, "r", encoding="utf-8") as file:
#         return file.read().strip()

# def write_output_to_file(file_path, content):
#     with open(file_path, "w", encoding="utf-8") as file:
#         file.write(content)

def generate_openai_response(prompt):
    completion = openai.ChatCompletion.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are a helpful assistant."},
            {"role": "user", "content": prompt}
        ]
    )

    return completion.choices[0].message["content"]

# Read input from file
# base_input = read_input_from_file(input_file_path)

# # Generate OpenAI response
# openai_response = generate_openai_response(base_input)

# # Write OpenAI response to file
# # write_output_to_file(output_file_path, openai_response)

# print("OpenAI response generated:", openai_response)
# print("OpenAI response generated and saved to:", output_file_path)

while True:
    input_file_path = input(str("Masukkan pertanyaan:"))
    base_input = input_file_path
    openai_response = generate_openai_response(base_input)
    print("OpenAI response generated:", openai_response)
    # print("OpenAI response generated and saved to:", input_file_path)