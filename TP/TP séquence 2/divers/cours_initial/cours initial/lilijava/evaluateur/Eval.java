
package lilijava.evaluateur;

import java.util.Hashtable;


public class Eval
{

    int setMaxOpLength()
    {
        boolean flag = false;
        int j = 0;
        for(int i = 0; i < ALLOWEDOPS.length; i++)
            if(ALLOWEDOPS[i].length() > j)
                j = ALLOWEDOPS[i].length();

        return j;
    }

    String car(String s)
    {
        s.length();
        int i = 0;
        int j = 2;
        int k = 0;
        if(s == "( )" || s == null)
            return null;
        if(s.charAt(2) == '(')
        {
            for(; j < s.length(); j++)
            {
                if(s.charAt(j) == '(')
                    k++;
                else
                if(s.charAt(j) == ')')
                    k--;
                if(k != 0)
                    continue;
                i = j;
                break;
            }

            return s.substring(2, i + 1);
        }
        else
        {
            return s.substring(2, s.indexOf(" ", 2));
        }
    }

    String cdr(String s)
    {
        if(s == "( )" || s == null)
        {
            return null;
        }
        else
        {
            String s1 = "";
            s1 = s1 + car(s);
            return "(" + s.substring(s1.length() + 2, s.length());
        }
    }

    String arg1(String s)
    {
        return car(cdr(s));
    }

    String arg2(String s)
    {
        return car(cdr(cdr(s)));
    }

    boolean isAllowedSym(char c)
    {
        boolean flag = false;
        for(int i = 0; i < ALLOWEDSYM.length; i++)
            if(ALLOWEDSYM[i].equalsIgnoreCase(String.valueOf(c)))
                return true;

        return false;
    }

    boolean isAllowedSym(String s)
    {
        boolean flag = false;
        for(int i = 0; i < ALLOWEDSYM.length; i++)
            if(ALLOWEDSYM[i].equalsIgnoreCase(s))
                return true;

        return false;
    }

    void Syntax(String s)
        throws Exception
    {
        int i = 0;
        Object obj = null;
        Object obj1 = null;
        if(!MatchParant(s))
            throw new Exception("Erreur de parenthèses");
        while(i < s.length()) 
        {
            String s1;
            try
            {
                if((s1 = getOp(s, i)) != null)
                {
                    String s2 = getOp(s, s1.length() + i);
                    if(isTwoArgOp(s2) && !s2.equalsIgnoreCase("+") && !s2.equalsIgnoreCase("-"))
                        throw new Exception("Erreur de syntaxe autour -> " + s.substring(i, s.length()));
                    if(!isTwoArgOp(s1) && BackTrack(s.substring(0, i)) == null && isConstant(s.charAt(i - 1)))
                        throw new Exception("Opérateur oublié avant -> " + s.substring(i, s.length()));
                }
                else
                if(!isAlpha(s.charAt(i)) && !isConstant(s.charAt(i)) && !isAllowedSym(s.charAt(i)))
                    throw new Exception("Erreur de syntaxe autour -> " + s.substring(i, s.length()));
            }
            catch(StringIndexOutOfBoundsException _ex) { }
            i++;
            Object obj2 = s1 = null;
        }

    }

    boolean MatchParant(String s)
    {
        int i = 0;
        boolean flag = false;
        for(int j = 0; j < s.length(); j++)
            if(s.charAt(j) == '(')
                i++;
            else
            if(s.charAt(j) == ')')
                i--;

        return i == 0;
    }

    boolean isAlpha(String s)
    {
        if(s == null)
            return false;
        if(s.length() > 1)
            return false;
        char c = s.charAt(0);
        return c >= 'a' && c <= 'z' || c >= 'A' && c <= 'Z';
    }

    boolean isAlpha(char c)
    {
        return c >= 'a' && c <= 'z' || c >= 'A' && c <= 'Z';
    }

    boolean isVariable(String s)
    {
        boolean flag = false;
        if(isAllNumbers(s))
            return false;
        for(int i = 0; i < s.length(); i++)
            if(getOp(s, i) != null || isAllowedSym(s.charAt(i)))
                return false;

        return true;
    }

    boolean isConstant(char c)
    {
        return isConstant(String.valueOf(c));
    }

    boolean isConstant(String s)
    {
        try
        {
            if(Float.isNaN(Float.valueOf(s).floatValue()))
                return false;
        }
        catch(Exception _ex)
        {
            return false;
        }
        return true;
    }

    boolean isConstant(float f)
    {
        return true;
    }

    boolean isConstant(int i)
    {
        return true;
    }

    boolean isConstant(double d)
    {
        return true;
    }

    boolean isAllNumbers(String s)
    {
        int i = 0;
        boolean flag = false;
        char c = s.charAt(0);
        if(c == '-' || c == '+')
            i = 1;
        for(; i < s.length(); i++)
        {
            char c1 = s.charAt(i);
            if(!isConstant(c1) && (c1 != '.' || flag))
                return false;
            if(c1 == '.')
                flag = true;
        }

        return true;
    }

    boolean isOperator(String s)
    {
        boolean flag = false;
        for(int i = 0; i < ALLOWEDOPS.length; i++)
            if(ALLOWEDOPS[i].equalsIgnoreCase(s))
                return true;

        return false;
    }

    boolean isOperator(char c)
    {
        boolean flag = false;
        for(int i = 0; i < ALLOWEDOPS.length; i++)
            if(ALLOWEDOPS[i].equalsIgnoreCase(String.valueOf(c)))
                return true;

        return false;
    }

    boolean isTwoArgOp(String s)
    {
        boolean flag = false;
        for(int i = 0; i < TWOARGOPS.length; i++)
            if(TWOARGOPS[i].equalsIgnoreCase(s))
                return true;

        return false;
    }

    boolean isTwoArgOp(char c)
    {
        boolean flag = false;
        for(int i = 0; i < TWOARGOPS.length; i++)
            if(TWOARGOPS[i].equalsIgnoreCase(String.valueOf(c)))
                return true;

        return false;
    }

    boolean isInteger(double d)
    {
        return d - (double)(int)d == 0.0D;
    }

    boolean isInteger(float f)
    {
        return f - (float)(int)f == 0.0F;
    }

    boolean isInteger(int i)
    {
        return true;
    }

    boolean isEven(int i)
    {
        return isInteger(i / 2);
    }

    boolean isEven(double d)
    {
        return isInteger(d / 2D);
    }

    boolean isEven(float f)
    {
        return isInteger(f / 2.0F);
    }

    boolean isSum(String s)
    {
        return car(s).equalsIgnoreCase("+");
    }

    boolean isSubtraction(String s)
    {
        return car(s).equalsIgnoreCase("-");
    }

    boolean isProduct(String s)
    {
        return car(s).equalsIgnoreCase("*");
    }

    boolean isDivision(String s)
    {
        return car(s).equalsIgnoreCase("/");
    }

    boolean isSquareroot(String s)
    {
        return car(s).equalsIgnoreCase("rac");
    }

    boolean isCosine(String s)
    {
        return car(s).equalsIgnoreCase("cos");
    }

    boolean isSine(String s)
    {
        return car(s).equalsIgnoreCase("sin");
    }

    boolean isTan(String s)
    {
        return car(s).equalsIgnoreCase("tan");
    }

    boolean isAtan(String s)
    {
        return car(s).equalsIgnoreCase("atan");
    }

    boolean isAcos(String s)
    {
        return car(s).equalsIgnoreCase("acos");
    }

    boolean isAsin(String s)
    {
        return car(s).equalsIgnoreCase("asin");
    }

    boolean isSinhyp(String s)
    {
        return car(s).equalsIgnoreCase("sinh");
    }

    boolean isCoshyp(String s)
    {
        return car(s).equalsIgnoreCase("cosh");
    }

    boolean isTanhyp(String s)
    {
        return car(s).equalsIgnoreCase("tanh");
    }

    boolean isLn(String s)
    {
        return car(s).equalsIgnoreCase("ln");
    }

    boolean isExponation(String s)
    {
        return car(s).equalsIgnoreCase("^");
    }

    boolean isE(String s)
    {
        return car(s).equalsIgnoreCase("exp");
    }

    boolean isCotan(String s)
    {
        return car(s).equalsIgnoreCase("cotan");
    }

    boolean isAcotan(String s)
    {
        return car(s).equalsIgnoreCase("acotan");
    }

    boolean isRound(String s)
    {
        return car(s).equalsIgnoreCase("round");
    }

    boolean isCeil(String s)
    {
        return car(s).equalsIgnoreCase("ceil");
    }

    boolean isFloor(String s)
    {
        return car(s).equalsIgnoreCase("floor");
    }

    boolean isFac(String s)
    {
        return car(s).equalsIgnoreCase("fac");
    }

    boolean isSfac(String s)
    {
        return car(s).equalsIgnoreCase("sfac");
    }

    boolean isAbs(String s)
    {
        return car(s).equalsIgnoreCase("abs");
    }

    boolean islog(String s)
    {
        return car(s).equalsIgnoreCase("log");
    }

    boolean isFpart(String s)
    {
        return car(s).equalsIgnoreCase("fpart");
    }

    boolean isMod(String s)
    {
        return car(s).equalsIgnoreCase("%");
    }

    boolean isAnd(String s)
    {
        return car(s).equalsIgnoreCase("&&");
    }

    boolean isLess(String s)
    {
        return car(s).equalsIgnoreCase("<");
    }

    boolean isLarger(String s)
    {
        return car(s).equalsIgnoreCase(">");
    }

    boolean isEqual(String s)
    {
        return car(s).equalsIgnoreCase("==");
    }

    boolean isNEqual(String s)
    {
        return car(s).equalsIgnoreCase("!=");
    }

    boolean isOr(String s)
    {
        return car(s).equalsIgnoreCase("||");
    }

    boolean isNot(String s)
    {
        return car(s).equalsIgnoreCase("!");
    }

    boolean isLargerEqual(String s)
    {
        return car(s).equalsIgnoreCase(">=");
    }

    boolean isLessEqual(String s)
    {
        return car(s).equalsIgnoreCase("<=");
    }

    boolean isSpecialConstant(String s)
    {
        boolean flag = false;
        for(int i = 0; i < SPECIAL_CONSTANTS.length; i++)
            if(s.equalsIgnoreCase(SPECIAL_CONSTANTS[i]))
                return true;

        return false;
    }

    String list(String s, String s1, String s2)
    {
        return "( " + s + " " + s1 + " " + s2 + " )";
    }

    String list(String s, String s1)
    {
        return "( " + s + " " + s1 + " )";
    }

    String firstOp(String s)
    {
        return car(s);
    }

    String InToPrefix(String s)
        throws Exception
    {
        String s1;
        String s7;
        String s10;
        String s2 = s7 = s10 = s1 = "";
        int i;
        int j = i = 0;
        if(s.equals(""))
            throw new Exception("Opérateurs trop nombreux");
        if(isVariable(s) || isAllNumbers(s))
            return s;
        if(s.charAt(0) == '(' && (j = Match(s, 0)) == s.length() - 1)
            return InToPrefix(s.substring(1, j));
        while(i < s.length()) 
        {
            String s11;
            if((s11 = getOp(s, i)) != null)
            {
                if(isTwoArgOp(s11))
                {
                    String s3;
                    if(s11.equalsIgnoreCase("+") || s11.equalsIgnoreCase("-"))
                    {
                        if(s1.equals(""))
                            s1 = "0";
                        String as[] = {
                            ">", "<", "<=", ">=", "==", "!=", "&&", "||", "+", "-"
                        };
                        s3 = ArgTo(s, i + 1, as);
                    }
                    else
                    if(s11.equalsIgnoreCase("==") || s11.equalsIgnoreCase("!="))
                    {
                        String as1[] = {
                            "==", "!=", "&&", "||"
                        };
                        s3 = ArgTo(s, i + s11.length(), as1);
                    }
                    else
                    if(s11.equalsIgnoreCase(">") || s11.equalsIgnoreCase("<") || s11.equalsIgnoreCase(">=") || s11.equalsIgnoreCase("<="))
                    {
                        String as2[] = {
                            ">", "<", "<=", ">=", "==", "!=", "&&", "||"
                        };
                        s3 = ArgTo(s, i + s11.length(), as2);
                    }
                    else
                    if(s11.equalsIgnoreCase("&&"))
                        s3 = ArgTo(s, i + s11.length(), "&&");
                    else
                    if(s11.equalsIgnoreCase("||"))
                    {
                        String as3[] = {
                            "||", "&&"
                        };
                        s3 = ArgTo(s, i + s11.length(), as3);
                    }
                    else
                    if(s11.equalsIgnoreCase("*") || s11.equalsIgnoreCase("/") || s11.equalsIgnoreCase("%"))
                        s3 = ArgToAnyOpExcept(s, i + 1, "^");
                    else
                        s3 = Arg(s, i + s11.length());
                    if(s1.equals(""))
                        throw new Exception("Opérateurs trop nombreux");
                    s1 = "( " + s11 + " " + s1 + " " + InToPrefix(s3) + " )";
                    i += s11.length() + s3.length();
                }
                else
                {
                    String s4 = Arg(s, i + s11.length());
                    s1 = s1 + "( " + s11 + " " + InToPrefix(s4) + " )";
                    i += s11.length() + s4.length();
                }
            }
            else
            {
                String s5 = Arg(s, i);
                s11 = getOp(s, i + s5.length());
                if(s11 == null)
                    throw new Exception("Opérateur manquant");
                if(isTwoArgOp(s11))
                {
                    String s8;
                    if(s11.equalsIgnoreCase("+") || s11.equalsIgnoreCase("-"))
                    {
                        String as4[] = {
                            ">", "<", "<=", ">=", "==", "!=", "&&", "||", "+", "-"
                        };
                        s8 = ArgTo(s, i + 1 + s5.length(), as4);
                    }
                    else
                    if(s11.equalsIgnoreCase("==") || s11.equalsIgnoreCase("!="))
                    {
                        String as5[] = {
                            "==", "!=", "&&", "||"
                        };
                        s8 = ArgTo(s, i + s5.length() + s11.length(), as5);
                    }
                    else
                    if(s11.equalsIgnoreCase(">") || s11.equalsIgnoreCase("<") || s11.equalsIgnoreCase(">=") || s11.equalsIgnoreCase("<="))
                    {
                        String as6[] = {
                            ">", "<", "<=", ">=", "==", "!=", "&&", "||"
                        };
                        s8 = ArgTo(s, i + s5.length() + s11.length(), as6);
                    }
                    else
                    if(s11.equalsIgnoreCase("&&"))
                        s8 = ArgTo(s, i + s5.length() + s11.length(), "&&");
                    else
                    if(s11.equalsIgnoreCase("||"))
                    {
                        String as7[] = {
                            "||", "&&"
                        };
                        s8 = ArgTo(s, i + s5.length() + s11.length(), as7);
                    }
                    else
                    if(s11.equalsIgnoreCase("*") || s11.equalsIgnoreCase("/") || s11.equalsIgnoreCase("%"))
                        s8 = ArgToAnyOpExcept(s, i + 1 + s5.length(), "^");
                    else
                        s8 = Arg(s, i + s11.length() + s5.length());
                    s1 = s1 + "( " + s11 + " " + InToPrefix(s5) + " " + InToPrefix(s8) + " )";
                    i += s5.length() + s8.length() + s11.length();
                }
                else
                {
                    s1 = s1 + "( " + s11 + " " + InToPrefix(s5) + " )";
                    i += s11.length() + s5.length();
                }
            }
            String s9;
            String s6 = s11 = s9 = "";
        }

        return s1;
    }

    String Arg(String s, int i)
    {
        boolean flag = false;
        int k = i;
        String s1 = "";
        String s2 = "";
        while(k < s.length()) 
            if(s.charAt(k) == '(')
            {
                int j = Match(s, k);
                s2 = s2 + s.substring(k, j + 1);
                k = j + 1;
            }
            else
            if((s1 = getOp(s, k)) != null)
            {
                if(s2 != "" && !isTwoArgOp(BackTrack(s2)))
                    return s2;
                s2 = s2 + s1;
                k += s1.length();
            }
            else
            {
                s2 = s2 + s.charAt(k);
                k++;
            }

        return s2;
    }

    String ArgToAnyOpExcept(String s, int i, String s1)
    {
        boolean flag = false;
        int k = i;
        String s2 = "";
        String s3 = "";
        while(k < s.length()) 
            if(s.charAt(k) == '(')
            {
                int j = Match(s, k);
                s3 = s3 + s.substring(k, j + 1);
                k = j + 1;
            }
            else
            if((s2 = getOp(s, k)) != null)
            {
                if(s3 != "" && !isTwoArgOp(BackTrack(s3)) && !s2.equalsIgnoreCase(s1))
                    return s3;
                s3 = s3 + s2;
                k += s2.length();
            }
            else
            {
                s3 = s3 + s.charAt(k);
                k++;
            }

        return s3;
    }

    String ArgToAnyOpExcept(String s, int i, String as[])
    {
        boolean flag = false;
        int k = i;
        String s1 = "";
        String s2 = "";
        while(k < s.length()) 
            if(s.charAt(k) == '(')
            {
                int j = Match(s, k);
                s2 = s2 + s.substring(k, j + 1);
                k = j + 1;
            }
            else
            if((s1 = getOp(s, k)) != null)
            {
                if(s2 != "" && !isTwoArgOp(BackTrack(s2)) && !memberOf(s1, as))
                    return s2;
                s2 = s2 + s1;
                k += s1.length();
            }
            else
            {
                s2 = s2 + s.charAt(k);
                k++;
            }

        return s2;
    }

    String ArgTo(String s, int i, String as[])
    {
        boolean flag = false;
        int k = i;
        String s1 = "";
        String s2 = "";
        while(k < s.length()) 
            if(s.charAt(k) == '(')
            {
                int j = Match(s, k);
                s2 = s2 + s.substring(k, j + 1);
                k = j + 1;
            }
            else
            if((s1 = getOp(s, k)) != null)
            {
                if(s2 != "" && !isTwoArgOp(BackTrack(s2)) && memberOf(s1, as))
                    return s2;
                s2 = s2 + s1;
                k += s1.length();
            }
            else
            {
                s2 = s2 + s.charAt(k);
                k++;
            }

        return s2;
    }

    String ArgTo(String s, int i, String s1)
    {
        boolean flag = false;
        int k = i;
        String s2 = "";
        String s3 = "";
        while(k < s.length()) 
            if(s.charAt(k) == '(')
            {
                int j = Match(s, k);
                s3 = s3 + s.substring(k, j + 1);
                k = j + 1;
            }
            else
            if((s2 = getOp(s, k)) != null)
            {
                if(s3 != "" && !isTwoArgOp(BackTrack(s3)) && s2.equals(s1))
                    return s3;
                s3 = s3 + s2;
                k += s2.length();
            }
            else
            {
                s3 = s3 + s.charAt(k);
                k++;
            }

        return s3;
    }

    boolean memberOf(String s, String as[])
    {
        for(int i = 0; i < as.length; i++)
            if(s.equals(as[i]))
                return true;

        return false;
    }

    String BackTrack(String s)
    {
        boolean flag = false;
        String s1 = "";
        try
        {
            for(int i = 0; i <= MAXOPLENGTH; i++)
            {
                String s2;
                if((s2 = getOp(s, (s.length() - 1 - MAXOPLENGTH) + i)) != null && (s.length() - MAXOPLENGTH - 1) + i + s2.length() == s.length())
                    return s2;
            }

        }
        catch(Exception _ex) { }
        return null;
    }

    String getOp(String s, int i)
    {
        boolean flag = false;
        for(int j = 0; j < MAXOPLENGTH; j++)
            try
            {
                if(isOperator(s.substring(i, i + (MAXOPLENGTH - j))))
                    return s.substring(i, i + (MAXOPLENGTH - j));
            }
            catch(Exception _ex) { }

        return null;
    }

    String SkipSpaces(String s)
    {
        String s1 = "";
        boolean flag = false;
        for(int i = 0; i < s.length(); i++)
            if(s.charAt(i) != ' ')
                s1 = s1 + s.charAt(i);

        return s1;
    }

    String PrepareExp(String s)
    {
        String s1 = SkipSpaces(s);
        if(s1.charAt(0) == '+' || s1.charAt(0) == '-')
            s1 = "0" + s1;
        return parseE(s1);
    }

    String parseE(String s)
    {
        boolean flag = false;
        String s1 = "";
        String s2 = "";
        for(int i = 0; i < s.length(); i++)
            try
            {
                if(s.charAt(i) == 'e' && isConstant(s.charAt(i - 1)))
                {
                    String s3 = Arg(s, i + 1);
                    if(s3.charAt(s3.length() - 1) == ')')
                        s3 = s3.substring(0, s3.indexOf(")"));
                    if(isAllNumbers(s3))
                        s1 = s1 + "*10^";
                    else
                        s1 = s1 + s.charAt(i);
                }
                else
                {
                    s1 = s1 + s.charAt(i);
                }
            }
            catch(Exception _ex)
            {
                s1 = s1 + s.charAt(i);
            }

        return s1;
    }

    int Match(String s, int i)
    {
        int j = i;
        int k = 0;
        for(; j < s.length(); j++)
        {
            if(s.charAt(j) == '(')
                k++;
            else
            if(s.charAt(j) == ')')
                k--;
            if(k == 0)
                return j;
        }

        return i;
    }

    double fac(double d)
    {
        if(!isInteger(d))
            return (0.0D / 0.0D);
        if(d < 0.0D)
            return (0.0D / 0.0D);
        if(d <= 1.0D)
            return 1.0D;
        else
            return d * fac(d - 1.0D);
    }

    double sfac(double d)
    {
        if(!isInteger(d))
            return (0.0D / 0.0D);
        if(d < 0.0D)
            return (0.0D / 0.0D);
        if(d <= 1.0D)
            return 1.0D;
        else
            return d * sfac(d - 2D);
    }

    double fpart(double d)
    {
        if(d >= 0.0D)
            return d - Math.floor(d);
        else
            return d - Math.ceil(d);
    }

    double getSpecialConstantValue(String s)
    {
        boolean flag = false;
        for(int i = 0; i < SPECIAL_CONSTANTS.length; i++)
            if(s.equalsIgnoreCase(SPECIAL_CONSTANTS[i]))
                return SPECIAL_CONSTANT_VALUES[i];

        return (0.0D / 0.0D);
    }

    double ToValue(String s)
        throws Exception
    {
        String s1 = "";
        String s3 = "";
        try
        {
            if(isConstant(s))
                return Double.valueOf(s).doubleValue();
            if(isVariable(s))
            {
                if(isSpecialConstant(s))
                    return getSpecialConstantValue(s);
                String s2 = get(s);
                s2 = SkipSpaces(s2.toLowerCase());
                if(s2.equalsIgnoreCase(s))
                    throw new Exception("Aucune association entre " + s + " et " + s2);
                if(isVariable(s2) || isAllNumbers(s2))
                    return ToValue(s2);
                Syntax(s2);
                String s4 = InToPrefix(parseE(s2));
                if(s4.indexOf(" " + s + " ") != -1)
                    throw new Exception("Aucune association entre " + s + " et " + s2);
                else
                    return ToValue(s4);
            }
            if(isSum(s))
                return ToValue(arg1(s)) + ToValue(arg2(s));
            if(isSubtraction(s))
                return ToValue(arg1(s)) - ToValue(arg2(s));
            if(isProduct(s))
                return ToValue(arg1(s)) * ToValue(arg2(s));
            if(isDivision(s))
                return ToValue(arg1(s)) / ToValue(arg2(s));
            if(isSquareroot(s))
                return Math.sqrt(ToValue(arg1(s)));
            if(isSine(s))
                return Math.sin((Math.PI/180)*ToValue(arg1(s)));
            if(isCosine(s))
                return Math.cos((Math.PI/180)*ToValue(arg1(s)));
            if(isTan(s))
                return Math.tan((Math.PI/180)*ToValue(arg1(s)));
            if(isAsin(s))
                return (180/Math.PI)*Math.asin(ToValue(arg1(s)));
            if(isAcos(s))
                return (180/Math.PI)*Math.acos(ToValue(arg1(s)));
            if(isAtan(s))
                return(180/Math.PI)* Math.atan(ToValue(arg1(s)));
            if(isExponation(s))
                return Math.pow(ToValue(arg1(s)), ToValue(arg2(s)));
            if(isLn(s))
                return Math.log(ToValue(arg1(s)));
            if(isE(s))
                return Math.exp(ToValue(arg1(s)));
            if(isSinhyp(s))
                return (Math.exp(ToValue(arg1(s))) - 1.0D / Math.exp(ToValue(arg1(s)))) / 2D;
            if(isCoshyp(s))
                return (Math.exp(ToValue(arg1(s))) + 1.0D / Math.exp(ToValue(arg1(s)))) / 2D;
            if(isTanhyp(s))
                return (Math.exp(ToValue(arg1(s))) - 1.0D / Math.exp(ToValue(arg1(s)))) / 2D / ((Math.exp(ToValue(arg1(s))) + 1.0D / Math.exp(ToValue(arg1(s)))) / 2D);
            if(isCotan(s))
                return 1.0D / Math.tan(ToValue(arg1(s)));
            if(isAcotan(s))
                return 1.5707963267948966D - Math.atan(ToValue(arg1(s)));
            if(isCeil(s))
                return Math.ceil(ToValue(arg1(s)));
            if(isRound(s))
                return (double)Math.round(ToValue(arg1(s)));
            if(isFloor(s))
                return Math.floor(ToValue(arg1(s)));
            if(isFac(s))
                return fac(ToValue(arg1(s)));
            if(isAbs(s))
                return Math.abs(ToValue(arg1(s)));
            if(islog(s))
                return Math.log(ToValue(arg2(s))) / Math.log(ToValue(arg1(s)));
            if(isMod(s))
                return ToValue(arg1(s)) % ToValue(arg2(s));
            if(isFpart(s))
                return fpart(ToValue(arg1(s)));
            if(isSfac(s))
                return sfac(ToValue(arg1(s)));
            if(isEqual(s))
                return ToValue(arg1(s)) != ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isNEqual(s))
                return ToValue(arg1(s)) == ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isLess(s))
                return ToValue(arg1(s)) >= ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isLarger(s))
                return ToValue(arg1(s)) <= ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isAnd(s))
                return ToValue(arg1(s)) != 1.0D || ToValue(arg2(s)) != 1.0D ? 0.0D : 1.0D;
            if(isOr(s))
                return ToValue(arg1(s)) != 1.0D && ToValue(arg2(s)) != 1.0D ? 0.0D : 1.0D;
            if(isLargerEqual(s))
                return ToValue(arg1(s)) < ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isLessEqual(s))
                return ToValue(arg1(s)) > ToValue(arg2(s)) ? 0.0D : 1.0D;
            if(isNot(s))
                return ToValue(arg1(s)) == 1.0D ? 0.0D : 1.0D;
        }
        catch(StringIndexOutOfBoundsException stringindexoutofboundsexception)
        {
            throw stringindexoutofboundsexception;
        }
        catch(Exception exception)
        {
            throw new Exception(exception.getMessage());
        }
        throw new Exception("Opérateur inconnu, " + s);
    }

    String get(String s)
        throws Exception
    {
        Object obj = HTBL.get(s);
        String s1 = "";
        if(obj == null)
            throw new Exception("Aucune valeur associée à " + s);
        s1 = (String)obj;
        if(s1.equals(""))
            throw new Exception("Aucune valeur associée à " + s);
        else
            return s1;
    }

    String findValues(String s)
    {
        int i = 0;
        String s1 = "";
        if(lastIndex >= s.length())
        {
            lastIndex = 0;
            return null;
        }
        i = s.indexOf(";", lastIndex);
        if(i == -1)
        {
            String s2 = s.substring(lastIndex, s.length());
            lastIndex = s.length();
            return s2;
        }
        else
        {
            String s3 = s.substring(lastIndex, i);
            lastIndex = i + 1;
            return s3;
        }
    }


    public double eval(String s, Hashtable hashtable)
        throws Exception
    {
        String s1 = "";
        if(s == null || s.equals("") || s.length() < 1)
            throw new Exception("le premier arguement est vide ou nul");
        if(hashtable == null)
            return eval(s);
        double d;
        try
        {
            HTBL = hashtable;
            if(EXPRESSION == "" || !EXPRESSION.equalsIgnoreCase(s))
            {
                EXPRESSION = s;
                EXPRESSION = EXPRESSION.toLowerCase();
                Syntax(SkipSpaces(EXPRESSION));
                String s2 = InToPrefix(PrepareExp(EXPRESSION));
                PREFIXEXP = s2;
            }
            d = ToValue(PREFIXEXP);
        }
        catch(StringIndexOutOfBoundsException _ex)
        {
            throw new Exception("Mauvais nombre de termes");
        }
        catch(Exception exception)
        {
            throw new Exception(exception.getMessage());
        }
        return d;
    }

    public double eval(String s, String s1)
        throws Exception
    {
        String s2 = "";
        Hashtable hashtable = new Hashtable(1001);
        if(s == null || s.equals("") || s.length() < 1)
            throw new Exception("Le premier arguement est vide ou nul");
        if(s1 == null || s1.equals("") || s1.length() < 1)
            return eval(s);
        try
        {
            s1 = SkipSpaces(s1.toLowerCase());
            while((s2 = findValues(s1)) != null) 
                hashtable.put(s2.substring(0, s2.indexOf("=")), s2.substring(s2.indexOf("=") + 1, s2.length()));

        }
        catch(StringIndexOutOfBoundsException _ex)
        {
            lastIndex = 0;
            throw new Exception("Erreur de syntaxe ->" + s1);
        }
        catch(Exception _ex)
        {
            lastIndex = 0;
            throw new Exception("Erreur de syntaxe ->" + s2);
        }
        return eval(s, hashtable);
    }

    public double eval(String s)
        throws Exception
    {
        return eval(s, new Hashtable());
    }
    public String formate(double d,int decimale)
		{		
		    String S=new String("")+d;
		    if (S.length()>decimale)
					{	Float f=new Float(S);//on arrondi a decimale
					S=""+ (Math.rint(f.floatValue()*Math.pow(10,decimale)))  /Math.pow(10,decimale);}
					if (S.endsWith(".0")) {S=S.substring(0,S.length()-2);} 
					while(S.endsWith("0")&& S.indexOf('.')!=-1){S=S.substring(0,S.length()-1);} 
         return S;}

		public String evaluer(String s, String s1,int decimale)
		{ String S=new String("");
		 try { S=formate(eval(s,s1),decimale);}
			catch(Exception f){	S=f.getMessage();	}
		return S;}
    public String evaluer(String s, Hashtable hashtable,int decimale)
		{ String S=new String("");
		 try { S=formate(eval(s,hashtable),decimale);}
			catch(Exception f){	S=f.getMessage();	}
		return S;}
    public String evaluer(String s,int decimale)
	{ String S=new String("");
		 try { S=formate(eval(s),decimale);}
			catch(Exception f){	S=f.getMessage();	}
		return S;}
    public String evaluer(String s, String s1)
		{return evaluer(s,s1,7);}
    public String evaluer(String s, Hashtable hashtable)
		{	return evaluer(s,hashtable,7);}
    public String evaluer(String s)
		{return evaluer(s,7);}

    public Eval()
    {
        EXPRESSION = "";
        PREFIXEXP = "";
        MAXOPLENGTH = setMaxOpLength();
    }

    String EXPRESSION;
    String PREFIXEXP;
    Hashtable HTBL;
    final String ALLOWEDOPS[] = {
        "^", "+", "-", "/", "*", "cos", "sin", "exp", "ln", "tan", 
        "acos", "asin", "atan", "cosh", "sinh", "tanh", "rac", "cotan", "fpart", "acotan", 
        "round", "ceil", "floor", "fac", "sfac", "abs", "log", "%", ">", "<", 
        "&&", "==", "!=", "||", "!", ">=", "<="
    };
    final String TWOARGOPS[] = {
        "^", "+", "-", "/", "*", "%", "log", ">", "<", "&&", 
        "==", "!=", "||", ">=", "<="
    };
    final String ALLOWEDSYM[] = {
        "(", ")", ".", ">", "<", "&", "=", "|"
    };
    final String SPECIAL_CONSTANTS[] = {
        "euler", "pi", "Impossible", "infini", "vrai", "faux"
    };
    final double SPECIAL_CONSTANT_VALUES[] = {
        2.7182818284590451D, 3.1415926535897931D, (0.0D / 0.0D), (1.0D / 0.0D), 1.0D, 0.0D
    };
    int MAXOPLENGTH;
    int lastIndex;
}
