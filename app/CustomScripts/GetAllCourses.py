import sys
import requests
import json

baseURL = "http://www.sfu.ca/bin/wcm/course-outlines?2018/fall"
response = requests.get(baseURL)
departments = json.loads(response.content)
['cmpt', 110, 'good course'],
for department in departments:
	departmentURL = baseURL + "/" + department['value']
	response = requests.get(departmentURL)
	courses = json.loads(response.content)
	for course in courses:
		if (response.status_code != 404):
			print('["' + department['value'] + '", "' + course['value'] + '", "' + course['title'] + '"],')
