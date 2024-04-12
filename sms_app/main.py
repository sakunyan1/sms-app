import os
import requests
import json

def send_message(phone_number):
    resp = requests.post('https://textbelt.com/text', {
        'phone': phone_number,
        'message': 'Hello world',
        'key': os.getenv('TEXTBELT'),
    })
    print(resp.json())

def get_phone_numbers():
    with open('phone_numbers.json', 'r') as f:
        data = json.load(f)
    return data['phone_numbers']

phone_numbers = get_phone_numbers()

for number in phone_numbers:
    send_message(number)
