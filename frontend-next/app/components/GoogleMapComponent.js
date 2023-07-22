"use client";

import React, { useEffect, useState } from "react";
import axios from "axios";
import { GoogleMap, LoadScript, Marker } from "@react-google-maps/api";
import Select from "react-select";
import "./GoogleMapComponent.css";
const containerStyle = {
  width: "100%",
  height: "600px",
};

const GoogleMapComponent = () => {
  const [locations, setLocations] = useState([]);
  const [selectedLocation, setSelectedLocation] = useState(null);
  const [searchQuery, setSearchQuery] = useState("");

  useEffect(() => {
    // Fetch data from API
    fetchLocations();
  }, []);

  const fetchLocations = () => {
    // Fetch data from API for the list of locations
    axios
      .get("http://127.0.0.1:8000/api/restaurants")
      .then((response) => {
        // Assuming the API response contains an array of objects with 'lat' and 'lng' properties
        const extractedLocations = response.data.Restaurants.map(
          (restaurant) => ({
            id: restaurant.id,
            name: restaurant.name,
            address: restaurant.address,
            lat: restaurant.latitude,
            lng: restaurant.longitude,
          })
        );
        setLocations(extractedLocations);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  };

  const handleSearch = (searchQuery) => {
    // Fetch data from API for the searched locations
    axios
      .get(`http://127.0.0.1:8000/api/restaurants-search?query=${searchQuery}`)
      .then((response) => {
        const extractedLocations = response.data.Restaurants.map(
          (restaurant) => ({
            id: restaurant.id,
            lat: restaurant.latitude,
            lng: restaurant.longitude,
            name: restaurant.name,
            address: restaurant.address,
          })
        );
        setSelectedLocation(
          extractedLocations ? extractedLocations : selectedLocation
        );
        setLocations(extractedLocations ? extractedLocations : locations);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  };

  const moveMarker = (location) => {
    // Set the selected location and move the map center to the selected location
    setSelectedLocation(location);
    center.lat = location.lat;
    center.lng = location.lng;
  };

  const center = {
    lat: selectedLocation?.lat ? selectedLocation?.lat : 13.8101442,
    lng: selectedLocation?.lng ? selectedLocation?.lng : 100.5301431,
  };

  const handleSelectChange = (selectedOption) => {
    setSearchQuery(selectedOption?.label);
    setSelectedLocation(selectedOption?.changeLocation);
    handleSearch(selectedOption?.label);
  };

  const locationOptions = locations.map((location) => ({
    value: location.name,
    label: location.name,
    changeLocation: {
      id: location?.id,
      name: location?.name,
      address: location?.address,
      lat: location?.lat,
      lng: location?.lng,
    },
  }));

  return (
    <>
      <div className="container mt-5">
        <div className="row">
          <div className="col-md-6">
            <h2>List of Locations:</h2>
            <Select
              value={{ value: searchQuery, label: searchQuery }}
              options={locationOptions}
              onChange={handleSelectChange}
              isClearable
              placeholder="Search for a location"
            />
            <ul className="list-group mt-3">
              {locations.map((location) => (
                <li
                  key={location.id}
                  className={`list-group-item ${
                    selectedLocation && selectedLocation.id === location.id
                      ? "active"
                      : ""
                  }`}
                  onClick={() => moveMarker(location)}
                >
                  {location.name}
                </li>
              ))}
            </ul>
          </div>
          <div className="col-md-6">
            <LoadScript
              googleMapsApiKey={
                GOOGLE_MAPS_API_KEY // แทนที่ด้วย Google Maps API Key ของคุณ
              }
            >
              <GoogleMap
                mapContainerStyle={containerStyle}
                center={center}
                zoom={15}
              >
                {locations.map((location) => (
                  <Marker
                    key={location.id}
                    position={{ lat: location.lat, lng: location.lng }}
                    onClick={() => moveMarker(location)}
                  />
                ))}
              </GoogleMap>
            </LoadScript>
          </div>
        </div>

        <div className="row mt-3">
          <div className="col-md-6">
            {selectedLocation && (
              <div className="card">
                <div className="card-body">
                  <h5 className="card-title">{selectedLocation.name}</h5>
                  <p className="card-text">{selectedLocation.address}</p>
                  <p className="card-text">
                    Latitude: {selectedLocation.lat}, Longitude:{" "}
                    {selectedLocation.lng}
                  </p>
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    </>
  );
};

export default GoogleMapComponent;
