#!/usr/bin/env python
import argparse
import requests
import json

class Weather():
    def __init__(self):
        parser = argparse.ArgumentParser(description="Get weather by zip code.")
        parser.add_argument('--zip_code', '-z', default='76102', type=int, help='Zip code of the location', required=False)
        args = parser.parse_args()
        self.zip_code = args.zip_code
        self.get_location_details_from_zipcode()
        self.get_gridpoint()

    def get_location_details_from_zipcode(self):
        # make a GET request to the zipcode API
        response = requests.get(f"https://api.zippopotam.us/us/{self.zip_code}")

        # check if the request was successful
        if response.status_code == 200:
            # get the JSON data from the response
            self.location_data = response.json()
        else:
            # if the request was unsuccessful, return None
            return None

    def get_gridpoint(self):
        # Getting lat and lon from get_location_details_from_zipcode location data
        lat = self.location_data['places'][0]['latitude']
        lon = self.location_data['places'][0]['longitude']
        base_url = f'https://api.weather.gov/points/{lat},{lon}'
        zip_code_url = base_url + str(self.zip_code)
        response = requests.get(zip_code_url)
        if response.status_code == 200:
            data = response.json()
            self.gridpoint = data['properties']['gridId']
            return self.gridpoint
        else:
            return None
        print(f'printing self.gridpoint: {self.gridpoint}')
        print(self.gridpoint)

    def get_forecast(self):
        # API endpoint for NOAA
        url = "https://api.weather.gov/gridpoints/MFL/94,72/forecast"

        # Send GET request to the API
        response = requests.get(url)

        # Check if the request was successful
        if response.status_code == 200:
            # Extract the JSON data from the response
            data = response.json()
            # Get the forecast data from the JSON data
            #forecast_data = data["properties"]["periods"]
            # Loop through the forecast data and print out the day and the forecast
            '''
            for day in forecast_data:
                print("Day:", day["name"])
                print("Forecast:", day["shortForecast"])
                print("\n")
            '''
            # Instead of looping I'll let the MCV PHP handle parsing
            print(data)
        else:
            print("Request failed, status code:", response.status_code)

if __name__ == '__main__':
    w = Weather()
    w.get_forecast()
