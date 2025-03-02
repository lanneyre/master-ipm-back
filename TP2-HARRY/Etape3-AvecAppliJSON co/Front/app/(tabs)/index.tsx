import { Text, View, StyleSheet } from 'react-native';
import { Link } from 'expo-router';
import CircleButton from '@/components/CircleButton';
import * as Location from 'expo-location';
import { useState, useEffect } from 'react';
import { LatLng } from '@/models/LatLng';
import { Redirect } from 'expo-router';
import { useSession } from '../../ctx';





//const urlServeur = "http://192.168.41.87/ipm-backend/TP2-HARRY/Etape3-AvecAppliJSON%20co/Back/"
const urlServeur = "https://master-ipm.remi-lanney.com/TP2-HARRY/Etape3-AvecAppliJSON%20co/Back/"


export default function Index() {
  const [location, setLocation] = useState<Location.LocationObject | null>(null);
  const [errorMsg, setErrorMsg] = useState<string | null>(null);
  const { session, isLoading } = useSession();
  if (!session) {
    return <Redirect href="/login" />;
  }

  const user = JSON.parse(session)


  const setPersonnes = async (enfant: string, LatLng: LatLng) => {
    try {
      const response = await fetch(urlServeur + 'enfants/locate.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ "enfant": enfant, "LatLng": LatLng }),
      });
      const json = await response.json();
      console.log(json);

    } catch (error) {
      console.error(error);
    }
  }

  const locateMe = () => {
    //setIsModalVisible(true);
    //console.log(JSON.stringify(location?.coords));
    const LatLng: LatLng = {
      latitude: location?.coords.latitude,
      longitude: location?.coords.longitude,
    }

    setPersonnes(user.id, LatLng)
    //console.log(LatLng);

  };
  useEffect(() => {
    async function getCurrentLocation() {

      let { status } = await Location.requestForegroundPermissionsAsync();
      if (status !== 'granted') {
        setErrorMsg('Permission to access location was denied');
        return;
      }

      let location = await Location.getCurrentPositionAsync({});
      setLocation(location);
    }

    getCurrentLocation();
  }, []);

  return (
    <View style={styles.container}>

      {/* <Link href="/login" style={styles.button}>
        Go to Login screen
      </Link> */}
      <CircleButton onPress={locateMe} icon='locate' />
      <Text style={styles.text}>Je suis bien arrivé, localise moi pour l'horloge</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#25292e',
    alignItems: 'center',
    justifyContent: 'center',
  },
  text: {
    color: '#fff',
    marginTop: 20
  },
  button: {
    fontSize: 20,
    textDecorationLine: 'underline',
    color: '#fff',
  },
});
