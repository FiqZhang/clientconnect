import React, { useEffect, useState } from 'react';

function ListGroup(){
    const items = [
        'Selangor',
        'kedah',
        'johor'
    ];
}

const Message = () => {
  // State to hold the message from the API
  const [message, setMessage] = useState<string | null>(null);
  
  useEffect(() => {
    // Fetch the message from the API
    fetch('http://localhost:8000/api/message')  // API URL
      .then((response) => response.json())  // Parse the response as JSON
      .then((data) => {
        // Set the message in the state
        setMessage(data.message);
      })
      .catch((error) => {
        console.error('Error fetching message:', error);
      });
  }, []);  // Empty dependency array means this runs once when the component is mounted

  return (
    
    <div>
      {/* Display the message or a loading indicator */}
      {message ? (
        <p>{message}</p>
        

      ) : (
        <p>Loading...</p> // Display a loading text if message is not fetched yet
      )}
    </div>
  );
};

export default Message;
