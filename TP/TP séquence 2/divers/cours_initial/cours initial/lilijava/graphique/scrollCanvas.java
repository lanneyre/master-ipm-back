package lilijava.graphique;
import java.awt.*;
/*
traiter le cas ou la photo est plus petite en largeur et en hauteur
dans ce cas ne pas mettre de scrollbar
*/
public class scrollCanvas extends Panel {
 int vw,vh;
 int rw,rh;
 Color f;
 myCanvas c;
 Scrollbar sv, sh;

 // constructor
 //   visible h w
 //   real    h w
 //   background foreground

  public scrollCanvas (int vw1, int vh1,Color f1,Image carte) {
  super();
  vw = vw1; vh = vh1;
  rh = carte.getHeight(this); rw =carte.getWidth(this);
  f  = f1;
  int ScrollIncrement = 10;
   //si visible supérieur à réel
	sv=null;
	sh=null;
	if ((vw<rw)&&(vh<rh))
	{setLayout(new BorderLayout());
	sv = new Scrollbar(Scrollbar.VERTICAL,0, ScrollIncrement, 0, rh-vh);
  add("East", sv);
	sh = new Scrollbar(Scrollbar.HORIZONTAL, 0, ScrollIncrement, 0, rw-vw);
  add("South", sh)	;
	c = new myCanvas(vw, vh, rw, rh,carte,sv,sh);
 	add("Center", c);}
  
	if ((vw<rw)&&(vh>=rh)){
  setLayout(new BorderLayout());
	sh = new Scrollbar(Scrollbar.HORIZONTAL, 0, ScrollIncrement, 0, rw-vw);
  add("South", sh)	;
  c = new myCanvas(vw, vh, rw, rh,carte,sv,sh);
 	add("Center", c);}
	
	if ((vw>=rw)&&(vh<rh)){
	setLayout(new BorderLayout());
  c = new myCanvas(vw, vh, rw, rh,carte,sv,sh);
 	add("Center", c);
	sv = new Scrollbar(Scrollbar.VERTICAL,0, ScrollIncrement, 0, rh-vh);
  add("East", sv);

  }
 
	if ((vw>=rw)&&(vh>=rh)){
		setLayout(new BorderLayout());
  c = new myCanvas(vw, vh, rw, rh,carte,sv,sh);
  add("Center",c);}
 	c.setBackground(f);
}

 public void redraw() {
  int y =-(vh-rh)/2;
  int x =-(vw-rw)/2;
	if (sv!=null){ y = sv.getValue();}
  if (sh!=null){ x = sh.getValue();}
  c.draw(x,y);
  }
  public boolean handleEvent(Event e) {
  if (e.target instanceof Scrollbar) {
    switch (e.id) {
      case Event.SCROLL_ABSOLUTE:
      case Event.SCROLL_PAGE_DOWN:
      case Event.SCROLL_PAGE_UP:
      case Event.SCROLL_LINE_UP:
      case Event.SCROLL_LINE_DOWN:
         redraw();
         return true;
      }
    }
    return super.handleEvent(e);
  }

 public Dimension minimumSize() {
  return new Dimension(vw,vh);
  }

 public Dimension preferredSize() {
  return new Dimension(vw,vh);
  }
}

class myCanvas extends Canvas {
 Scrollbar sv,sh;
	int vw, vh;
 int rw, rh;
 int x, y;
 Image buffImage;
 Graphics offscreen;
 boolean initDone;
 myCanvas (int vw1, int vh1, int rw1, int rh1, Image carte,Scrollbar sv, Scrollbar sh){
  super();
	this.sv=sv;
	this.sh=sh;
	buffImage=carte;
  vw = vw1; vh = vh1;
  rh = rh1; rw = rw1;
  initDone = false;
  y =(vh-rh)/2;
	if (y<0) {y=0;}
  x =(vw-rw)/2;
	if (x<0) {x=0;}

  repaint();
  }
        
 public void paint(Graphics g) {
  if (!initDone) 
   initpaint(g);
   g.drawImage(buffImage, x, y,  this);
  }

 public void update(Graphics g) {
  g.drawImage(buffImage, x, y,  this);
  }

 public void initpaint(Graphics g) {
	// permet de tenir compte de la largeur et la hauteur des bar de deplacement
	Rectangle r=bounds();
	if (sv!=null){sv.setValues(0, 10, 0, rh-r.height);}
	if (sh!=null){sh.setValues(0, 10, 0, rw-r.width);}
  }

 public void draw (int x1, int y1)  {
  x = -x1;
  y = -y1;
  update(getGraphics());
  }
                
 public Dimension minimumSize() {
  return new Dimension(vw,vh);
  }

 public Dimension preferredSize() {
  return new Dimension(vw,vh);
  }
}



