import { LatLng } from '@/models/LatLng';

export type Personne = {
    id: string;
    nom: string;
    prenom: string;
    img: string;
    lieu: string;
    LatLng: LatLng;
    date: string;
}