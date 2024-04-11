import requests
import schedule
import time
import os


textbelt=os.environ['TEXTBELT']

def send_message():
  resp = requests.post('http://textbelt.com/text', {
    'phone': '12069494331',
    'message': 'Good Morning',
    'key': textbelt
  })

  print(resp.json())

  schedule.every().day.at('05:00').do(send_message)

  #schedule.every(10).seconds.do(send_message)

  while True:
    schedule.run_pending()
    time.sleep(1)