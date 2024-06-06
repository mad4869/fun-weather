const useFetchLocation = (): Promise<string> => {
    return new Promise((resolve, reject) => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const location = `${position.coords.latitude},${position.coords.longitude}`;
                    resolve(location);
                },
                (error) => {
                    console.error("Unable to retrieve your location", error);
                    reject(error);
                }
            );
        } else {
            console.error("Geolocation is not supported by this browser.");
            reject(new Error("Geolocation is not supported by this browser."));
        }
    });
};

export default useFetchLocation;