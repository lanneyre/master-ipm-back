import { useContext, createContext, type PropsWithChildren } from 'react';
import { useStorageState } from './useStorageState';
import { Personne } from '@/models/Personne';

const AuthContext = createContext<{
    signIn: (personne: Personne) => void;
    signOut: () => void;
    session?: string | null;
    isLoading: boolean;
}>({
    signIn: (personne) => null,
    signOut: () => null,
    session: null,
    isLoading: false,
});

// This hook can be used to access the user info.
export function useSession() {
    const value = useContext(AuthContext);
    if (process.env.NODE_ENV !== 'production') {
        if (!value) {
            throw new Error('useSession must be wrapped in a <SessionProvider />');
        }
    }

    return value;
}

export function SessionProvider({ children }: PropsWithChildren) {
    const [[isLoading, session], setSession] = useStorageState('session');

    return (
        <AuthContext.Provider
            value={{
                signIn: (personne: Personne) => {
                    // Perform sign-in logic here
                    //console.log(personne);

                    setSession(JSON.stringify(personne));
                },
                signOut: () => {
                    setSession(null);
                },
                session,
                isLoading,
            }
            }>
            {children}
        </AuthContext.Provider>
    );
}
