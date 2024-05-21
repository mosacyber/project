package Database_Predction2;

import weka.core.Attribute;
import weka.core.DenseInstance;
import weka.core.Instances;
import weka.classifiers.Classifier;
import weka.core.SerializationHelper;
import java.util.ArrayList;

public class Seconde {
           
      public static void main(String[] args) {
    
          if (args.length < 8) {
            System.out.println("خطأ: لا توجد معطيات كافية");
            return;
        }
          try {
                int Quiz1val = Integer.parseInt(args[0]);
                int Mid1val = Integer.parseInt(args[1]);
                int Lab_Quizval = Integer.parseInt(args[2]);
                int Quiz2val = Integer.parseInt(args[3]);
                int Mid2val = Integer.parseInt(args[4]);
                int Projectval = Integer.parseInt(args[5]);
                int Quiz3val = Integer.parseInt(args[6]);
                int Lab_Finalval = Integer.parseInt(args[7]);             
               
                Seconde sp = new Seconde();
                double color = sp.predictcolor(Quiz1val, Mid1val, Lab_Quizval, Quiz2val, Mid2val, Projectval, Quiz3val, Lab_Finalval);
                System.out.println(Math.round(color));
            } catch (NumberFormatException e) {
                System.out.println("خطأ في نوع البيانات المدخلة, يجب ان تكون من ارقام فقط.");
            } catch (Exception e) {
                System.out.println("خطأ: " + e.getMessage());
            }
        }
            public double predictcolor(int Quiz1val,int Mid1val, int Lab_Quizval, int Quiz2val, int Mid2val, int Projectval , int Quiz3val , int Lab_Finalval) {
            try {
                // تعريف السمات
                Attribute Quiz1 = new Attribute("Quiz1");
                Attribute Mid1 = new Attribute("Mid1");
                Attribute Lab_Quiz = new Attribute("Lab_Quiz");
                Attribute Quiz2 = new Attribute("Quiz2");
                Attribute Mid2 = new Attribute("Mid2");
                Attribute Project = new Attribute("Project");
                Attribute Quiz3 = new Attribute("Quiz3");
                Attribute Lab_Final = new Attribute("Lab_Final");
                Attribute Color = new Attribute("Color");

                ArrayList attributes = new ArrayList();
                attributes.add(Quiz1);
                attributes.add(Mid1);
                attributes.add(Lab_Quiz);
                attributes.add(Quiz2);
                attributes.add(Mid2);
                attributes.add(Project);
                attributes.add(Quiz3);
                attributes.add(Lab_Final);
                attributes.add(Color);

                // إنشاء مجموعة بيانات جديدة
                Instances dataset = new Instances("SecondePredictionDB", attributes, 0);
                dataset.setClassIndex(dataset.numAttributes() - 1);  
                
                DenseInstance instance = new DenseInstance(9);
                instance.setValue(Quiz1,Quiz1val);
                instance.setValue(Mid1,Mid1val);
                instance.setValue(Lab_Quiz,Lab_Quizval);
                instance.setValue(Quiz2,Quiz2val);
                instance.setValue(Mid2,Mid2val);
                instance.setValue(Project,Projectval);
                instance.setValue(Quiz3,Quiz3val);
                instance.setValue(Lab_Final,Lab_Finalval);

                // إضافة المثيل إلى مجموعة البيانات
                dataset.add(instance);

            Classifier cls = (Classifier) SerializationHelper.read("D:\\DB_Dataset_Seconde\\DB_Dataset_Seconde.model");

                double predictedcolor = cls.classifyInstance(dataset.instance(0));
                return predictedcolor;
            } catch (Exception e) {
                return -1; 
            } 
    } 
}

