import java.applet.Applet;
import java.awt.*;
import java.net.URL;
import java.util.Vector;
import lilijava.graphique.scrollCanvas;

class qcm5View extends Panel
{

    public qcm5View(Applet applet, float i)
    {
        application = applet;
        scoi = i;
        scof= scoi/3; //3 erreurs possibles
        compteur = ((qcm5)applet).compteur + 1;
        Enregistrement = (qcm5Enregistrement)((qcm5)applet).liste.elementAt(((qcm5)applet).compteur);
        setLayout(new BorderLayout());
        add("North", QuestionPanel = new qcm5QuestionPanel(Enregistrement, compteur));
        add("Center", ReponsePanel = new qcm5ReponsePanel(Enregistrement));
        add("South", new Button("V\351rification"));
        if(!Enregistrement.leDessin.equals("RIEN"))
        {
            tracker = new MediaTracker(this);
            try
            {
                carte = applet.getImage(new URL(applet.getDocumentBase(), Enregistrement.leDessin));
                tracker.addImage(carte, 0);
                tracker.waitForAll();
            }
            catch(Exception exception)
            {
                exception.printStackTrace();
            }
            add("East", new scrollCanvas(230, 250, new Color(138, 187, 250), carte));
        }
    }

    public void paint(Graphics g)
    {
        Rectangle rectangle = bounds();
        g.setColor(new Color(138, 187, 250));
        g.fillRect(0, 0, rectangle.width, rectangle.height);
    }

    public Insets insets()
    {
        return new Insets(10, 10, 10, 10);
    }

    public int verification()
    {
        return ReponsePanel.reponse != Enregistrement.solution - 1 ? 1 : 0;
    }

    public boolean action(Event event, Object obj)
    {
        if((event.target instanceof Button) && ((String)obj).equals("V\351rification"))
        {
            if(verification() == 0)
            {
                postEvent(new Event(this, 1001, "CmMessage: Bravo!"));
                ((qcm5)application).compteur++;
                ((qcm5)application).scop = ((qcm5)application).scop + scoi;
                if(((qcm5)application).compteur < ((qcm5)application).total)
                    postEvent(new Event(this, 1001, "CmJeux"));
                else
                    postEvent(new Event(this, 1001, "CmQuit"));
            } else
            {
                scoi -= scof;
                if(scoi < 1)
                {
                    scoi = 0;
                    postEvent(new Event(this, 1001, "CmMessage: Trop d'erreurs!"));
                    ((qcm5)application).compteur++;
                    ((qcm5)application).scop = ((qcm5)application).scop + scoi;
                    if(((qcm5)application).compteur < ((qcm5)application).total)
                        postEvent(new Event(this, 1001, "CmJeux"));
                    else
                        postEvent(new Event(this, 1001, "CmQuit"));
                } else
                {
                    postEvent(new Event(this, 1001, "CmMessage: Recommence!"));
                }
            }
            return true;
        } else
        {
            return false;
        }
    }

    float scoi;
    float scof;
    Applet application;
    qcm5Enregistrement Enregistrement;
    qcm5QuestionPanel QuestionPanel;
    qcm5ReponsePanel ReponsePanel;
    Image carte;
    MediaTracker tracker;
    int compteur;
}