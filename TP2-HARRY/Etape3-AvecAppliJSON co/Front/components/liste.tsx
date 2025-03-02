import { useEffect, useState } from 'react';
import { View, StyleSheet, FlatList, Text, Pressable } from 'react-native';

import { Personne } from '@/models/Personne';


type Props = {
    onSelect: (n: Personne) => void;
    onCloseModal: () => void;
};



const Item = (personne: Personne) => (
    <View style={styles.item}>
        <Text style={styles.title}>{personne.prenom} {personne.nom}</Text>
    </View>
);


//const urlServeur = "http://192.168.41.87/ipm-backend/TP2-HARRY/Etape3-AvecAppliJSON%20co/Back/"
const urlServeur = "https://master-ipm.remi-lanney.com/TP2-HARRY/Etape3-AvecAppliJSON%20co/Back/"

export default function Liste({ onSelect, onCloseModal }: Props) {
    const [personnes, setPersonnes] = useState<Personne[]>([]);
    const getPersonnes = async () => {
        try {
            const response = await fetch(urlServeur + 'enfants/all.php');
            const json = await response.json();
            //console.log(json);

            setPersonnes(json);
        } catch (error) {
            console.error(error);
        }
    }

    useEffect(() => {
        getPersonnes();
    }, []);

    //console.log(personnes);

    return (
        <FlatList
            data={personnes}
            contentContainerStyle={styles.listContainer}
            renderItem={({ item, index }) => (
                <Pressable
                    onPress={() => {
                        onSelect(item);
                        onCloseModal();
                    }}>
                    <Item {...item} />
                </Pressable>
            )}
        />
    );
}

const styles = StyleSheet.create({
    listContainer: {
        borderTopRightRadius: 10,
        borderTopLeftRadius: 10,
        paddingHorizontal: 20,
        flexDirection: 'column',
        alignItems: 'center',
        justifyContent: 'space-between',
    },
    image: {
        width: 100,
        height: 100,
        marginRight: 20,
    },
    item: {
        width: 300,
        textAlign: 'center',
        backgroundColor: '#fff',
        borderRadius: 20,
        padding: 20,
        marginVertical: 8,
    },
    title: {
        fontSize: 20,
    },
});