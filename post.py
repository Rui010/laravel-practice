import urllib.request
import json
import csv

url = "http://localhost:8000/api/cell"
headers = {'Content-Type': 'application/json',}

def postData(url, data, headers):
    req = urllib.request.Request(url, json.dumps(data).encode(), headers)
    with urllib.request.urlopen(req) as res:
        body = res.read()
        print(body)

def csvToObj(csvfile):
    data = []
    with open(csvfile, 'r') as f:
        reader = csv.DictReader(f)

        for row in reader:
            data.append(row)
    return data

if __name__ == "__main__":
    data = csvToObj("action.csv")
    for d in data:
        postData(url, d, headers)