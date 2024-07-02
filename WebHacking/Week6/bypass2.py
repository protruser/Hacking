import requests

url = "http://ctf.segfaulthub.com:9999/login2/login.php"

headers = {
    "Host": "ctf.segfaulthub.com:9999",
    "Cache-Control": "max-age=0",
    "Upgrade-Insecure-Requests": "1",
    "Origin": "http://ctf.segfaulthub.com:9999",
    "Content-Type": "application/x-www-form-urlencoded",
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.60 Safari/537.36",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    "Referer": "http://ctf.segfaulthub.com:9999/login2/login.php",
    "Accept-Encoding": "gzip, deflate, br",
    "Accept-Language": "ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7",
    "Cookie": "session=f5c66545-b26c-45ea-a674-43542784a5fb.6DNPkC-EQhGBmhiZy7FOx8xgM4U; PHPSESSID=eos29dhq139rs20j1id14r3rag",
    "Connection": "keep-alive"
}

data = {
    "UserId": "doldol",
    "Password": "dol1234",
    "Submit": "Login"
}

response = requests.post(url, headers=headers, data=data)

print(response.status_code)
