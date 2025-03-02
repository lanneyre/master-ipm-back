import { Text, View, StyleSheet } from 'react-native';
import { useEffect, useState } from 'react';

import React from 'react';
import MapView, { Marker, PROVIDER_GOOGLE } from 'react-native-maps';

import { LatLng } from '@/models/LatLng';
import { Personne } from '@/models/Personne';


const urlServeur = "https://master-ipm.remi-lanney.com/TP2-HARRY/Etape3-AvecAppliJSON%20co/Back/"

// AIzaSyB_1sbSZyziW0v7mqf52_bLlagK_kLIMRk

export default function mc() {

    const [localisations, setLoc] = useState<LatLng[]>([]);
    const getLocations = async () => {
        try {
            const response = await fetch(urlServeur + 'enfants/all.php');
            const json = await response.json();
            setLoc(json);
        } catch (error) {
            console.error(error);
        }
    }
    const INITIAL_REGION = {
        latitude: 46.9,
        longitude: 2.5,
        latitudeDelta: 7.0,
        longitudeDelta: 13.0,
    }

    useEffect(() => {
        getLocations();
    }, []);
    return (
        <View style={styles.container}>
            <MapView style={styles.map} provider={PROVIDER_GOOGLE} initialRegion={INITIAL_REGION}>
                {localisations.map((loc) => (
                    <Marker
                        coordinate={loc.LatLng}
                        title={loc.prenom + " " + loc.nom}
                        key={loc.id}
                    />
                ))}
            </MapView>
        </View >
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
    },
    map: {
        width: '100%',
        height: '100%',
    },
});