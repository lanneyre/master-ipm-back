import java.applet.Applet;
import java.awt.*;
import java.io.DataInputStream;
import java.io.FilterInputStream;
import java.net.URL;
import java.util.Vector;
import lilijava.application.cApplet;

public class qcm5 extends cApplet
{

    public void init()
    {
        ExoView = null;
        setLayout(new BorderLayout());
        add("North", panneau = new Label("Pas encore effectu\351", 1));
        panneau.setBackground(new Color(118, 162, 217));
        add("South", barre = new qcm5Barre());
        scop = 0;
        compteur = 0;
        total = 10;
        DonneListe();
    }

    public Insets insets()
    {
        return new Insets(10, 10, 10, 10);
    }

    String SkipSpaces(String s)
    {
        String s1 = "";
        for(int i = 0; i < s.length(); i++)
            if(s.charAt(i) != ' ')
                s1 = s1 + s.charAt(i);

        return s1;
    }

    public void DonneListe()
    {
        String s = getParameter("data");
        try
        {
            String s1 = "";
            URL url = new URL(getDocumentBase(), s);
            DataInputStream datainputstream = new DataInputStream(url.openStream());
            while((s1 = datainputstream.readLine()) != null) 
            {
                if(s1.startsWith("#"))
                {
                    liste.addElement(new qcm5Enregistrement());
                    Enregistrement = (qcm5Enregistrement)liste.lastElement();
                }
                if(s1.startsWith("IM"))
                    Enregistrement.leDessin = SkipSpaces(s1.substring(2));
                if(s1.startsWith("Q1"))
                    Enregistrement.question[0] = s1.substring(2);
                if(s1.startsWith("Q2"))
                    Enregistrement.question[1] = s1.substring(2);
                if(s1.startsWith("Q3"))
                    Enregistrement.question[2] = s1.substring(2);
                if(s1.startsWith("R1"))
                    Enregistrement.réponse[0] = s1.substring(2);
                if(s1.startsWith("R2"))
                    Enregistrement.réponse[1] = s1.substring(2);
                if(s1.startsWith("R3"))
                    Enregistrement.réponse[2] = s1.substring(2);
                if(s1.startsWith("R4"))
                    Enregistrement.réponse[3] = s1.substring(2);
                if(s1.startsWith("R5"))
                    Enregistrement.réponse[4] = s1.substring(2);
                if(s1.startsWith("V"))
                    Enregistrement.solution = Integer.parseInt(SkipSpaces(s1.substring(1)));
            }
            datainputstream.close();
        }
        catch(Exception exception)
        {
            exception.printStackTrace();
        }
        total = liste.size();
        String s2 = getParameter("hasard");
        if(s2.equals("oui"))
        {
            int i = liste.size();
            for(int j = 0; j < i - 1; j++)
            {
                qcm5Enregistrement qcm5enregistrement = (qcm5Enregistrement)liste.elementAt(j);
                int k = (int)(Math.random() * (double)(i - j - 1)) + j + 1;
                qcm5Enregistrement qcm5enregistrement1 = (qcm5Enregistrement)liste.elementAt(k);
                liste.setElementAt(qcm5enregistrement, k);
                liste.setElementAt(qcm5enregistrement1, j);
            }

        }
    }

    public void InsertView()
    {
        if(ExoView != null)
        {
            remove(ExoView);
            ExoView = null;
        }
        ExoView = new qcm5View(this, (float)100/total);
        add("Center", ExoView);
        validate();
    }

    public void reinitialise()
    {
        barre.bouton.setLabel("Lance l'application");
        barre.bouton.invalidate();
        validate();
        if(ExoView != null)
        {
            remove(ExoView);
            ExoView = null;
        }
        compteur = 0;
        total = 10;
        liste.removeAllElements();
        DonneListe();
        add("North", panneau = new Label("Score =" + donneScore() + "%", 1));
        panneau.invalidate();
        panneau.setBackground(new Color(81, 111, 204));
        validate();
    }

    public boolean gotFocus(Event event, Object obj)
    {
        return false;
    }

    public boolean action(Event event, Object obj)
    {
        if(((String)obj).equals("CmJeux"))
        {
            InsertView();
            return true;
        }
        if(((String)obj).startsWith("CmMessage"))
        {
            Message(((String)obj).substring(10));
            return true;
        }
        if(((String)obj).equals("CmQuit"))
        {
            Message("Tu obtiens " +donneScore()+ "% de r\351ussite!");
            reinitialise();
            return true;
        }
        if((event.target instanceof Button) && ((String)obj).equals("Lance l'application"))
        {
            ((Button)event.target).setLabel("Quitte");
            ((Button)event.target).invalidate();
            validate();
            scop = 0;
            if(panneau != null)
            {
                remove(panneau);
                panneau = null;
            }
            postEvent(new Event(this, 1001, "CmJeux"));
            return true;
        }
        if((event.target instanceof Button) && ((String)obj).equals("Quitte"))
        {
            postEvent(new Event(this, 1001, "CmQuit"));
            return true;
        } else
        {
            return false;
        }
    }

    public void paint(Graphics g)
    {
        Rectangle rectangle = bounds();
        g.setColor(new Color(81, 111, 204));
        g.fillRect(0, 0, rectangle.width, rectangle.height);
    }
    public int donneScore(){
    	if (scop>99) scop=100;
    	return (int)(scop);
    };

    public qcm5()
    {
        liste = new Vector(10, 5);
        Enregistrement = new qcm5Enregistrement();
    }

    Vector liste;
    qcm5Enregistrement Enregistrement;
    qcm5Barre barre;
    Label panneau;
    float scop;
    int compteur;
    int total;
    qcm5View ExoView;
}
