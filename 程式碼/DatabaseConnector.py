import requests

class DBconnector():
    def execute(self, query_string):
        try:
            connectURL = "http://ligandpath.mis.ncyu.edu.tw:8888/DBB_prophitfolio.php"
            payload = {'query_string': query_string}

            request = requests.post(connectURL, data=payload)
            print("Your SQL is : " + str(payload))
            return request.text
        except requests.RequestException as error:
            print(error)
