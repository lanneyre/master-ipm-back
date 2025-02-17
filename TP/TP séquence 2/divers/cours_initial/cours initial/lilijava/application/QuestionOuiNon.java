package lilijava.application;
import java.awt.*;
import java.awt.event.*;

/*
// header - edit "Data/yourJavaHeader" to customize
// contents - edit "EventHandlers/Java file/onCreate" to customize
//
*/
public class QuestionOuiNon extends Dialog{
Panel PanelBouton;
Button b1,b2;
cApplet maman;
public  QuestionOuiNon (cApplet maman,String Mess, String titre )
	{super(maman.maFenetre,titre,true);
	addWindowListener
        (new WindowAdapter() {
            public void windowClosing(WindowEvent e) {
               e.getWindow().dispose();
               }
            }
        );
		this.maman=maman;
		//traitement de la taille de la fenêtre
		int ligne=1;
		for (int i=0; i<Mess.length();i++)
		{if (Mess.charAt(i)=='\n'){ligne++;}
		}
		int j=0;
		int l=0;
		String texte []= new String [ligne];
			for (int i=0; i<Mess.length();i++)
		{ if (Mess.charAt(i)=='\n')
		     {
					texte[j]=(String)(Mess.substring(l,i));
					l=i+1;
					j++;}
		}
		texte[ligne-1]=(String)(Mess.substring(l,Mess.length()));
		int longueur=100;
		for (int g=0; g<ligne;g++)
    {longueur=Math.max(longueur,texte[g].length()*8);}
		setLayout(new GridLayout(ligne+1,1));
		for (int i=0; i<ligne;i++){add(new Label(texte[i],Label.CENTER));}
		add(PanelBouton=new Panel());
		PanelBouton.add (b1=new Button("OUI"));
		PanelBouton.add (b2=new Button("NON"));
    b1.addActionListener(new B1());
		b2.addActionListener(new B2());
    resize(longueur,30*(ligne+3));
    centreEcran();

  }
	  class B1 implements ActionListener{
	public void actionPerformed(ActionEvent e)
	{	maman.retour="OUI";
	 dispose();
	 maman.maFenetre.requestFocus();
   }
	}
	  class B2 implements ActionListener{	
	public void actionPerformed(ActionEvent e)
	{maman.retour="NON";
	dispose();
	maman.maFenetre.requestFocus();
		}
	}

//Centrer Une fenêtre modale
 public void centreEcran() {
   Dimension dim = getToolkit().getScreenSize();
   Rectangle abounds = getBounds();
   setLocation((dim.width - abounds.width) / 2,
       (dim.height - abounds.height) / 2);
   super.setVisible(true);
   requestFocus();
   }
}
