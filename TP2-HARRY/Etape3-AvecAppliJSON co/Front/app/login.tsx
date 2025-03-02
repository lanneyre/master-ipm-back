import { router } from 'expo-router';
import { View, Pressable, StyleSheet } from 'react-native';
import { useSession } from '../ctx';
import CircleButton from '@/components/CircleButton';
import { useState } from 'react';
import UserPicker from '@/components/UserPicker';
import Liste from '@/components/liste';
import { Personne } from '@/models/Personne';


export default function Login() {
    const { signIn } = useSession();
    const onAddUser = () => {
        setIsModalVisible(true);
    };
    const onModalClose = () => {
        setIsModalVisible(false);
    };
    const [isModalVisible, setIsModalVisible] = useState<boolean>(false);
    function setPickedUser(p: Personne) {
        signIn(p);
        router.replace('/');
    }
    //const [pickedUser, setPickedUser] = useState("");
    //console.log(pickedUser);

    return (
        <View style={styles.container}>
            <View style={styles.optionsRow}>
                <CircleButton onPress={onAddUser} icon='person-circle' />
            </View>
            <UserPicker isVisible={isModalVisible} onClose={onModalClose}>
                <Liste onSelect={setPickedUser} onCloseModal={onModalClose} ></Liste>
            </UserPicker>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#25292e',
        justifyContent: 'center',
        alignItems: 'center',
    },
    text: {
        color: '#fff',
    },
    optionsContainer: {
        position: 'absolute',
        bottom: 80,
    },
    optionsRow: {
        alignItems: 'center',
        flexDirection: 'row',
    },
});
