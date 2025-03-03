import { useSession } from '../../ctx';
//import { router } from 'expo-router';

export default function LogoutScreen() {
    const { signOut } = useSession();
    signOut()
    //router.replace('/');
    //return;
}
