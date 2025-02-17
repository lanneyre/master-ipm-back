package lilijava.evaluateur;
import java.util.*;
import java.awt.*;

public class EvalTextArea extends TextArea
{  Eval expression = new Eval();
	double ans = Double.NaN;
	String S=new String();
  Hashtable valeurs;
	String temp = "";
	int ind1 = 0;
	int ind2 = 0;
 public EvalTextArea( )
	{
	  super(""); //on rappelle le constructeur hérité 11,45
		valeurs = new Hashtable();
	//	valeurs.put("k","5");
}

public void remplace(String s1, String s2){
				int a=S.indexOf(s1);
				while (a!=-1)
				{
				// on remplace
				S=S.substring(0,a)+s2+S.substring(a+s1.length(),S.length());
				//on cherche les autres;
				a=S.indexOf(s1);
				}
	}
	
	public boolean handleEvent(Event e) {
	 boolean afaire = false;
		switch (e.id) {
	  case Event.KEY_PRESS:
			            char c = (char)e.key;
			    				S=getText();
       if (c =='\n') 
			{ //la phrase se termine par un retour chariot}
			 //il faut vérifier que le curseur est précédé d'un =
				int posStart=getSelectionEnd()-1;
				while (S.charAt(posStart)==' ')
				{posStart--;}
				if (S.charAt(posStart)=='=')
				{				
				//selectionner le bon string;
			  //postEvent(new Event (this,Event.ACTION_EVENT,"CmMessage: envoie"+S));
				int posEnd=posStart;
				while ((posStart>-1)&&(S.charAt(posStart)!='\n'))  
				{posStart--;}
				S=S.substring(posStart+1,posEnd);
			  S=S.toLowerCase(); 
				//traitement des mots français
		    remplace("mod","%");
				// traitement des valeurs des variables
				//evaluation proprement dite
				 S=" "+expression.evaluer(S,valeurs);
				insertText(S,posEnd+1);
				// la phrase qui suit bouge le curseur pour ie4.0
				replaceText("",(posEnd+1+S.length()),(posEnd+2+S.length()));
				int i=0;
        return super.handleEvent(e);
				} // fin du test il ya un égal
				else 	
				{	//selectionner le bon string;
				int posEnd=posStart;
				while ((posStart>-1)&&(S.charAt(posStart)!='\n'))  
				{posStart--;}
				S=S.substring(posStart+1,posEnd+1);
			  S=S.toLowerCase(); 
				//traitement des mots français
		    remplace("mod","%");
				//extraction de la valeur
        try
        {valeurs.put(S.substring(0, S.indexOf("=")), S.substring(S.indexOf("=") + 1, S.length()));}
        catch(StringIndexOutOfBoundsException _ex) {;}
        return super.handleEvent(e);}
				} // fin du premier if (retour chariot)
				else 	return super.handleEvent(e);
	  default:
	    return super.handleEvent(e);
   } // case
	}
}

