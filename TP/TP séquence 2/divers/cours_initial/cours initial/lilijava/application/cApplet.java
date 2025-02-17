package lilijava.application;
import java.awt.*;
import java.io.*;
import java.lang.*;
import java.util.*;
//reste à regarder la centralisation des frames
//regarder également la méthode show et setvisible

public class cApplet extends java.applet.Applet {
  	public Frame maFenetre=new Frame();
		String titre=new String("");
		String thème=new String("");
		public String retour= new String("");
		public String leBrowser = "APPLICATION";

	public void init()
	{
	  Component c = getParent();
	  while ((c != null) && !(c instanceof Frame)) c = c.getParent();
	  maFenetre = (Frame) c;
	//titre=getCodeBase().getFile();
String appletContext = getAppletContext().toString();
if (appletContext.startsWith("sun.applet.AppletViewer"))
   leBrowser = "APPLETVIEWER";
else if (appletContext.startsWith("netscape.applet."))
   leBrowser = "NETSCAPE";
else if (appletContext.startsWith("com.ms.applet."))
   leBrowser = "IE";
else if (appletContext.startsWith("sunw.hotjava.tags.TagAppletPanel"))
   leBrowser = "HOTJAVA";
else if (appletContext.startsWith( "sun.plugin.navig.win32.AppletPlugin"))
   leBrowser = "NETSCAPEPLUGIN";
else if (appletContext.startsWith( "sun.plugin.ocx.ActiveXApplet"))
   leBrowser = "MICROSOFTPLUGIN";
	}

 
public String questionOuiNon(String Mes)
  {retour="";
	QuestionOuiNon FenetreMessage= new QuestionOuiNon(this,Mes, "Question");
	return retour;
	}
public String questionReponse(String Mes)
  {retour="";
	QuestionReponse FenetreMessage= new QuestionReponse(this,Mes, "Question");
	return retour;
	}
public void Message(String Mes)
	{	CMessage FenetreMessage= new CMessage(this,Mes);
  }
    public boolean handleEvent(Event evt) {
    if(evt.id == Event.WINDOW_DESTROY) 
      System.exit(0);
    else 
      return super.handleEvent(evt);
    return true;
  }
 public void setTitre(String titre)
	{this.titre=titre;
	 thème=titre;}
 public void setThème(String thème)
	{this.thème=thème;}
	public boolean action(Event e, Object arg) 
  {
 if (((String)arg).startsWith("CmMessage")){			
			Message(((String)arg).substring(10));
			return true;
				}

	return false;
  }
	  public static void départ(String[] args,cApplet applet) {
   
		CApp f=new CApp(applet);
		applet.init();
		applet.maFenetre=f;
		// initialisation du score
		// le code c'est toujours le dernier
    if (args.length>0){
		 f.setCode(args[args.length-1]);}
    f.setTitle(applet.titre);
		f.lireCode();
		f.add("Center", applet);		
		f.resize(400,350);
		f.setVisible(true);
  }

}
class CApp extends Frame{
		MenuBar mb1 = new MenuBar();
    Menu f = new Menu("Fichier");
    MenuItem[] file = {
    new MenuItem("Code"),
    new MenuItem("Identité"),
    new MenuItem("Score"),
    new MenuItem("Quitte")};
		String code;
		Vector listeScore;
    tIdent ident=new tIdent();
		tScore score=new tScore();
		cApplet applet;
public CApp(cApplet applet)
{  
this.applet=applet;
score.setNBessai(new Integer(-1));
for(int i = 0; i < file.length; i++)
    f.add(file[i]);
	  mb1.add(f);
    setMenuBar(mb1);
}
//charger tout les scores dans une liste

public void chargeScore()
{
listeScore= new Vector();
if (code!=null){
		try {
			String fichier=code+".sco";
	    // Ouverture du fichier passé en paramètre dans la ligne de commande
		  InputStream fluxFichier = new FileInputStream (fichier);
		  // on saute l'entête
			fluxFichier.skip(53);
			//on lit des scores tant qu'il y en a
			byte entier []=new byte[2];
			tScore sco = new tScore();
			int a=0;
      while (a>-1)
			{
			//on met le score dans la liste
			listeScore.addElement(new tScore());
			sco=(tScore)(listeScore.lastElement());
			sco.setThème(readStr(8,fluxFichier));
			sco.setProg(readStr(8,fluxFichier));
 			a=fluxFichier.read(entier);
			Integer nb= new Integer(entier[0]);
      sco.setNBessai(nb);
      a=fluxFichier.read(entier);
			Integer re= new Integer(entier[0]);
	    sco.setResult(re);
			}
			listeScore.removeElementAt(listeScore.size()-1);
			fluxFichier.close();
		    }
	  catch(Exception e) {
	    e.printStackTrace();
		    }
  }
;}
//lire un score dont on connait le theme
public void lireScore()
{
  score.setProg(applet.titre);
	score.setThème(applet.thème);
	score.setNBessai(new Integer(0));//par défaut
	score.setResult(new Integer(0));
	tScore sco2=new tScore();
 for (int i=0;i<listeScore.size();i++)
 {sco2=(tScore)(listeScore.elementAt(i));//transtypage
	if ((sco2.Thème.equals(score.Thème))&&(sco2.Prog.equals(score.Prog)))
	 {score.NBessai=sco2.NBessai;
		score.Result=sco2.Result;
		//on a sauvé dans score ce qu'il fallait
		;}
	;}
;}
public void upgradeScore()
{
	tScore sco2=new tScore();
 for (int i=0;i<listeScore.size();i++)
 {sco2=(tScore)(listeScore.elementAt(i));//transtypage
	if ((sco2.Thème.equals(score.Thème))&&(sco2.Prog.equals(score.Prog)))
	 {sco2.NBessai=new Integer(sco2.NBessai.intValue()+1);
		if (score.Result.intValue()>sco2.Result.intValue()){sco2.Result=score.Result;};
		//on a sauvé dans score ce qu'il fallait
		;}
	;}
;}
public void afficheScore()
{
if (code==null){applet.Message("Il faut d'abord choisir un code");};
if ((code!=null)&& (score.NBessai.intValue()==-1))
 {chargeScore();
  lireScore();
}
if ((code!=null)&& (score.NBessai.intValue()>-1))
{

applet.Message("Nom du Programme: "+score.Prog+'\n'+
                "Nom du Thème: "+score.Thème+'\n'+
								"Nombre d'essai: "+score.NBessai+'\n'+
								"Meilleur score: "+score.Result+" %");}
;}
public void sauveScore()
{;}
public void afficheCode()
{CMessIdent FenetreMessage= new CMessIdent(this,ident);
FenetreMessage.resize(200,150);
FenetreMessage.setVisible(true);
;}

public void setCode(String s) {
code=s;
}
public String readStr(int taille,InputStream fluxFichier)
{ 
  byte longueur []=new byte[1];
	byte str [ ] = new byte [taille];
		try {
   fluxFichier.read(longueur);
	fluxFichier.read (str);
			    }
	  catch(Exception e) {
	    e.printStackTrace();
		    }

  String s=new String(str, 0);
  s=s.substring(0,longueur[0]);
	return s;
}
public void lireCode() {
if (code!=null){
		try {
  		byte b[];
			String fichier=code+".sco";
	    // Ouverture du fichier passé en paramètre dans la ligne de commande
		  InputStream fluxFichier = new FileInputStream (fichier);
		  // Lecture des 21 premiers octets du fichier. tstr20
			ident.setNom(readStr(20,fluxFichier));
			ident.setPrenom(readStr(20,fluxFichier));
  		ident.setClasse(readStr(10,fluxFichier));
			fluxFichier.close();
		    }
	  catch(Exception e) {
	    e.printStackTrace();
		    }
  }
	else
	{
			ident.setNom("pas de code choisi");
			ident.setPrenom("");
  		ident.setClasse("");
	}
 // écrire le nom et le prénom dans la barre
	String s= new String(getTitle());
 int index=s.lastIndexOf(" Elève");
	if (index>0){ s=s.substring(0,index);}
 setTitle(s+" Elève: "+ident.Nom+" "+ident.Prenom+" "+ident.Classe);
};
  public boolean handleEvent(Event evt) {
    if((evt.id == Event.WINDOW_DESTROY)||(evt.target.equals(file[3]))) 
      System.exit(0);
    if(evt.target.equals(file[1]))
		{afficheCode();}
    if(evt.target.equals(file[2]))
		{afficheScore();}
		if(evt.target.equals(file[0])) {
      // Two arguments, defaults to open file:
      FileDialog d = new FileDialog(this,
        "Quel code voulez vous ouvrir?");
      d.setFile("*.sco"); // Filename filter
      d.setDirectory("."); // Current directory
      d.show();
      String openFile;
      if((openFile = d.getFile()) != null) {
			code=openFile;
			code=code.substring(0,code.length()-4);
			lireCode();
      } 
    } 

    return super.handleEvent(evt);
  }
}
class tScore extends Object
{
 String  Thème ;
 String Prog   ;  
 Integer  NBessai ;
 Integer Result  ;
	public tScore(){;}
	public void setThème(String Thème){this.Thème=new String(Thème);}
  public void setProg(String Prog){this.Prog=new String(Prog);}
  public void setNBessai(Integer NBessai){this.NBessai=NBessai;}
  public void setResult(Integer Result){this.Result=Result;}
	}

class tIdent extends Object {
String Nom;
String Prenom;
String Classe;
public tIdent(){;}
public void setNom(String Nom){this.Nom=new String(Nom);}
public void setPrenom(String Prenom){this.Prenom=new String(Prenom);}
public void setClasse(String Classe){this.Classe=new String(Classe);}
}
 class CMessIdent extends Dialog{
	Panel PanelBouton;
	Frame f;
	public CMessIdent (Frame f,tIdent ident)
	
	{
	 super(f,"Identité de l'élève",true);
		this.f=f;	
		setLayout(new GridLayout(4,1));
		add(new Label("Nom : "+ident.Nom,Label.CENTER));
		add(new Label("Prénom : "+ident.Prenom,Label.CENTER));
		add(new Label("Classe : "+ident.Classe,Label.CENTER));
		add(PanelBouton=new Panel());
		PanelBouton.add (new Button("OK"));
	}
  public boolean action(Event e, Object arg) 
	{ if ((e.target instanceof Button)&&(((String)arg).equals("OK")))
		{	 dispose();
		   f.requestFocus();
			 return true;
		}
		else return false;
	}		
	public void paint(Graphics g)
	{ Rectangle r = bounds();
	  Dimension pr = Toolkit.getDefaultToolkit().getScreenSize();
	 move ((pr.width-r.width)/2,(pr.height-r.height)/2);
  }
	public boolean handleEvent(Event e) 
	{
		switch (e.id) 
		{
	  case Event.WINDOW_DESTROY:
			dispose(); 
	    return true;
	  default:
	    return super.handleEvent(e);
		}
	}
}
class CMessage extends Dialog{
	Panel PanelBouton;
	cApplet maman;
	public CMessage (cApplet maman ,String Mess)
	
	{
	 super(maman.maFenetre,"Message LiliJava",true);
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
		PanelBouton.add (new Button("OK"));
		resize(longueur,30*(ligne+3));
    centreEcran();
	}
  public boolean action(Event e, Object arg) 
	{ if ((e.target instanceof Button)&&(((String)arg).equals("OK")))
		{	 dispose();
		   maman.maFenetre.requestFocus();
			 return true;
		}
		else return false;
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


   
 // centre une fenêtre modale au centre de son conténaire Parent
	public void centreParent () {
   int x;
   int y;

   // Find out our parent 
   Container myParent = getParent();
   Point topLeft = myParent.getLocationOnScreen();
   Dimension parentSize = myParent.getSize();

   Dimension mySize = getSize();

   if (parentSize.width > mySize.width) 
     x = ((parentSize.width - mySize.width)/2) + topLeft.x;
   else 
     x = topLeft.x;
    
   if (parentSize.height > mySize.height) 
     y = ((parentSize.height - mySize.height)/2) + topLeft.y;
   else 
     y = topLeft.y;
    
   setLocation (x, y);
   super.setVisible(true);
   requestFocus();
   }  	
	
	public boolean handleEvent(Event e) 
	{
		switch (e.id) 
		{
	  case Event.WINDOW_DESTROY:
			dispose(); 
	    return true;
	  default:
	    return super.handleEvent(e);
		}
	}
}


