import { Text } from 'react-native';
import { Redirect, Stack, Tabs } from 'expo-router';
import Ionicons from '@expo/vector-icons/Ionicons';
import { useSession } from '../../ctx';

export default function AppLayout() {
    const { session, isLoading } = useSession();

    // You can keep the splash screen open, or render a loading screen like we do here.
    if (isLoading) {
        return <Text>Loading...</Text>;
    }

    // Only require authentication within the (app) group's layout as users
    // need to be able to access the (auth) group and sign in again.
    if (!session) {
        // On web, static rendering will stop here as the user is not authenticated
        // in the headless Node process that the pages are rendered in.
        return <Redirect href="/login" />;
    }

    const user = JSON.parse(session)


    // This layout can be deferred because it's not the root layout.
    return (
        <Tabs
            screenOptions={{
                tabBarActiveTintColor: '#ffd33d',
            }}
        >
            <Tabs.Screen
                name="index"
                options={{
                    title: 'Bienvenue ' + user.prenom,
                    tabBarIcon: ({ color, focused }) => (
                        <Ionicons name={focused ? 'home-sharp' : 'home-outline'} color={color} size={24} />
                    ),
                }}
            />
            <Tabs.Screen
                name="mc"
                options={{
                    title: 'Horloge',
                    tabBarIcon: ({ color, focused }) => (
                        <Ionicons name={focused ? 'time' : 'time-outline'} color={color} size={24} />
                    ),
                }}
            />
            <Tabs.Screen
                name="logout"
                options={{
                    title: 'Logout',
                    tabBarIcon: ({ color, focused }) => (
                        <Ionicons name={focused ? 'log-out' : 'log-out-outline'} color={color} size={24} />
                    ),
                }}

            />
        </Tabs>
    );
}
